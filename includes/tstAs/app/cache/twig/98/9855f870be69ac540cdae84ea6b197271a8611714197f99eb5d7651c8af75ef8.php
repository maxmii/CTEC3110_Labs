<?php

/* layout.html.twig */
class __TwigTemplate_a5af593f674dab1b7d0dd037c8c58244ebf8a14b72e85f7defe8b6ab4d8eef92 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'banner' => array($this, 'block_banner'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=”en\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["css_path"] ?? null), "html", null, true);
        echo "\" type=\"text/css\"/>
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
";
        // line 9
        $this->displayBlock('banner', $context, $blocks);
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 11
        echo "</body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 9
    public function block_banner($context, array $blocks = array())
    {
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 10,  57 => 9,  52 => 6,  46 => 11,  44 => 10,  42 => 9,  36 => 6,  32 => 5,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.html.twig", "H:\\p3t\\phpappfolder\\includes\\Assessment\\app\\Templates\\layout.html.twig");
    }
}
