$(function() {
    try {
        var modelXml = $.parseXML($("#model-xml").text().trim()),
            configurationXml = $.parseXML($("#configuration-xml").text().trim()),
            model = new Model(new XmlModel(modelXml)),
            configuration = Configuration.fromXml(model, configurationXml);

        window.app = new ModelViz(model, {
            target: $(".model-viz"),
            size: "100%"
        }, configuration);
    } catch (e) {
        alert(e);
    }
});
