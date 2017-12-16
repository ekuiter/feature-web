$(function() {
    try {
        var modelXml = $.parseXML($("#model-xml").text().trim()),
            configurationXml = $.parseXML($("#configuration-xml").text().trim()),
            model = new Model(new XmlModel(modelXml)),
            configuration = Configuration.fromXml(model, configurationXml),
            options = {
                target: $(".configurator"),

                renderer: {
                    renderAround: function(fn) {
                        var html = "<p>This configuration is " + (this.configuration.isValid() ? "valid" : "invalid") +
                            " and " + (this.configuration.isComplete() ? "complete" : "incomplete") + ".</p>";
                        html += fn();
                        return html;
                    },

                    afterRender: function() {
                        var self = this;
                        $(".export").show().removeClass("disabled").addClass((self.configuration.isComplete() ? "" : "disabled")).
                            unbind("click").click(function() {
                                if (self.configuration.isComplete()) {
                                    $("#configuration").val(self.configuration.serialize());
                                    $("form").submit();
                                }
                            });
                    },

                    renderLabel: function(label, feature) {
                        var klass = this.configuration.isEnabled(feature) ? "enabled" : this.configuration.isDisabled(feature) ? "disabled" : "";
                        var selectable = this.configuration.isManual(feature) || !this.configuration.isAutomatic(feature);
                        return label.addClass(klass).addClass(selectable ? "selectable" : "").text(feature.name).attr("title", feature.description);
                    },
                }
            };

        window.app = new Configurator(model, options, configuration);
    } catch (e) {
        alert(e);
    }
});
