(function ($) {

  "use strict";

  /**
   * Elementor Editor Init (SAFE)
   */
  $(window).on("elementor/editor/init", function () {

    // Safety check
    if (typeof window.elementor === "undefined" || !elementor.hooks) {
      return;
    }

    /**
     * Modify Elements Panel (widgets + categories)
     */
    elementor.hooks.addFilter("panel/elements/regionViews", function (regionViews) {

      // Stop if Pro active or no placeholders
      if (
        typeof RBELAD_EDITOR === "undefined" ||
        RBELAD_EDITOR.hasPro ||
        _.isEmpty(RBELAD_EDITOR.placeholder_widgets)
      ) {
        return regionViews;
      }

      var elementsCollection   = regionViews.elements.options.collection;
      var categoriesCollection = regionViews.categories.options.collection;

      var categoriesMap = {};

      // ============================================
      // STEP 1: Add fake widgets + group by category
      // ============================================
      _.each(RBELAD_EDITOR.placeholder_widgets, function (widget, name) {

        var cat = widget.cat || "rbelad_pro_fallback";

        var model = elementsCollection.add({
          name: "rbelad-" + name,
          title: widget.title || name.replace(/-/g, " "),
          icon: widget.icon || "rbelad-wf rbelad-wf-" + name,
          categories: [cat],
          editable: false
        });

        if (!categoriesMap[cat]) {
          categoriesMap[cat] = [];
        }

        categoriesMap[cat].push(model);
      });

      // ============================================
      // STEP 2: Create categories dynamically
      // ============================================
      _.each(categoriesMap, function (widgets, catSlug) {

        var catData = RBELAD_EDITOR.pro_categories
          ? RBELAD_EDITOR.pro_categories[catSlug]
          : null;

        categoriesCollection.add({
          name: catSlug,
          title: (catData && catData.title) ? catData.title : catSlug,
          icon: (catData && catData.icon) ? catData.icon : "eicon-lock",
          defaultActive: false,
          items: widgets
        });

      });

      // ============================================
      // STEP 3: Lock widget behavior (SAFE override)
      // ============================================
      var ElementViewExtension = {

        className: function () {
          var className = this.constructor.__super__.className.call(this);

          if (!this.isEditable() && this.isRBWidget()) {
            className += " rbelad-locked-widget";
          }

          return className;
        },

        isRBWidget: function () {
          var name = this.model.get("name");
          return name && name.indexOf("rbelad-") === 0;
        },

        onMouseDown: function () {

          if (!this.isRBWidget()) {
            this.constructor.__super__.onMouseDown.apply(this, arguments);
            return;
          }

          if (elementor && elementor.promotion) {
            elementor.promotion.showDialog({
              title: RBELAD_EDITOR.i18n.promotionDialogHeader.replace('%s', this.model.get("title")),
              content: RBELAD_EDITOR.i18n.promotionDialogMessage.replace('%s', this.model.get("title")),
              actionButton: {
                url: "https://your-site.com/pricing",
                text: RBELAD_EDITOR.i18n.promotionDialogBtnTxt,
                classes: ["elementor-button", "rbelad-go-pro"]
              }
            });
          }

        }
      };

      regionViews.elements.view = regionViews.elements.view.extend({
        childView: regionViews.elements.view.prototype.childView.extend(ElementViewExtension)
      });

      return regionViews;
    });

    /**
     * STEP 4: Add category promotion UI (SAFE - no override)
     */
    elementor.hooks.addAction(
      "panel/elements/category/afterRender",
      function (view) {

        if (
          typeof RBELAD_EDITOR === "undefined" ||
          !RBELAD_EDITOR.pro_categories
        ) {
          return;
        }

        var catSlug = view.model.get("name");

        if (!RBELAD_EDITOR.pro_categories[catSlug]) {
          return;
        }

        var $heading = view.$el.find(".elementor-panel-heading-title");

        if ($heading.length && !$heading.siblings(".elementor-panel-heading-promotion").length) {

          var $promo = $(
            '<span class="elementor-panel-heading-promotion">' +
              '<a href="https://your-site.com/pricing" target="_blank">' +
                '<i class="eicon-upgrade-crown"></i> Upgrade' +
              '</a>' +
            '</span>'
          );

          $heading.after($promo);
        }

      }
    );

  });

})(jQuery);