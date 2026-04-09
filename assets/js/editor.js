jQuery(window).on("elementor:init", function () {

  elementor.on("panel:init", function () {

    if (typeof elementor === "undefined" || !elementor.hooks) {
      return;
    }

    elementor.hooks.addFilter("panel/elements/regionViews", function (regionViews) {

      // Return if pro active.
      if (RBELAD_EDITOR.hasPro || _.isEmpty(RBELAD_EDITOR.placeholder_widgets)) {
        return regionViews;
      }

      var elementsCollection   = regionViews.elements.options.collection;
      var categoriesCollection = regionViews.categories.options.collection;

      var categoriesMap = {}; // group holder

      // ============================================
      // STEP 1: Add fake widgets + group by category
      // ============================================
      _.each(RBELAD_EDITOR.placeholder_widgets, function (widget, name) {

        var cat = widget.cat || "rbelad_pro_fallback";

        // Create widget model
        var model = elementsCollection.add({
          name: "rbelad-" + name,
          title: widget.title || name.replace(/-/g, " "),
          icon: widget.icon || "rbelad-wf rbelad-wf-" + name,
          categories: [cat],
          editable: false
        });

        // Group by category
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
      // STEP 3: Add category upgrade button
      // ============================================
      var CategoryView = regionViews.categories.view.prototype;

      regionViews.categories.view = regionViews.categories.view.extend({
        childView: CategoryView.childView.extend({

          onRender: function () {
            CategoryView.childView.prototype.onRender.apply(this, arguments);

            var catSlug = this.model.get("name");

            // Only add upgrade for PRO placeholder categories
            if (RBELAD_EDITOR.pro_categories && RBELAD_EDITOR.pro_categories[catSlug]) {

              var $heading = this.$el.find(".elementor-panel-heading-title");

              // Avoid duplicate
              if ($heading.siblings(".elementor-panel-heading-promotion").length === 0) {

                var $promo = jQuery(
                  '<span class="elementor-panel-heading-promotion">' +
                    '<a href="https://your-site.com/pricing" target="_blank">' +
                    '<i class="eicon-upgrade-crown"></i>Upgrade' +
                    '</a>' +
                  '</span>'
                );

                $heading.after($promo);
              }
            }
          }

        })
      });

      // ============================================
      // STEP 4: Lock behavior override for widgets
      // ============================================
      var ElementView = {
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
            this.constructor.__super__.onMouseDown.call(this);
            return;
          }

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
      };

      // Apply widget override
      regionViews.elements.view = regionViews.elements.view.extend({
        childView: regionViews.elements.view.prototype.childView.extend(ElementView)
      });

      return regionViews;
    });

  });

});