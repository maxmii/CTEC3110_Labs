<?php

/* banner.html.twig */
class __TwigTemplate_6b23aff405a00bdf4b9378cd48e9b54058dbc8e677d82b1a5923bfb98e8e0b48 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "banner.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'banner' => array($this, 'block_banner'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ($context["page_title"] ?? null), "html", null, true);
    }

    // line 3
    public function block_banner($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"banner-div\">
    <h1>";
        // line 5
        echo twig_escape_filter($this->env, ($context["page_heading_1"] ?? null), "html", null, true);
        echo "</h1>
    <p class=\"cent\">
        Page last updated on <script type=\"text/javascript\">document.write(document.lastModified)</script>
        <br />
        Maintained by <a href=\"mailto:cfi@dmu.ac.uk\">cfi@dmu.ac.uk</a>
    </p>
    <hr class=\"deepline\"/>
</div>
<div id=\"clear-div\"></div>
";
    }

    public function getTemplateName()
    {
        return "banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 5,  42 => 4,  39 => 3,  33 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "banner.html.twig", "H:\\p3t\\phpappfolder\\includes\\encryption_and_hashing\\app\\templates\\banner.html.twig");
    }
}
