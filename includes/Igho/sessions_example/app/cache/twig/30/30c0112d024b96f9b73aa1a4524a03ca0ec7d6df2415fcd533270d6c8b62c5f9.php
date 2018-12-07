<?php

/* display_storage_result.html.twig */
class __TwigTemplate_ed767bef8cab7db0c7dae42580889ead0bbfe7468290406f2fd3c9fdad50acd9 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 3
        $this->parent = $this->loadTemplate("banner.html.twig", "display_storage_result.html.twig", 3);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "banner.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <div id=\"page-content-div\">
        <h3>";
        // line 6
        echo twig_escape_filter($this->env, ($context["page_heading_2"] ?? null), "html", null, true);
        echo "</h3>
        <h4>";
        // line 7
        echo twig_escape_filter($this->env, ($context["sid_text"] ?? null), "html", null, true);
        echo twig_escape_filter($this->env, ($context["sid"] ?? null), "html", null, true);
        echo "</h4>
        <h4>";
        // line 8
        echo twig_escape_filter($this->env, ($context["storage_text"] ?? null), "html", null, true);
        echo "</h4>
        <p class=\"curr_page\"><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["landing_page"] ?? null), "html", null, true);
        echo "\">Home</a></p>
        <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo " \" method=\"post\">
            <input id=\"sid\" name=\"sid\" type=\"hidden\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["sid"] ?? null), "html", null, true);
        echo "\" size=\"30\" maxlength=\"50\">
            <input type=\"submit\" value=\"View the information >>>\">
            </form>


    </div>
";
    }

    public function getTemplateName()
    {
        return "display_storage_result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 11,  55 => 10,  51 => 9,  47 => 8,  42 => 7,  38 => 6,  35 => 5,  32 => 4,  15 => 3,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "display_storage_result.html.twig", "H:\\p3t\\phpappfolder\\includes\\sessions_example\\app\\templates\\display_storage_result.html.twig");
    }
}
