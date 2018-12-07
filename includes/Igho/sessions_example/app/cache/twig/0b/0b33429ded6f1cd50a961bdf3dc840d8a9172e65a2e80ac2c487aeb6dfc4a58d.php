<?php

/* homepageform.html.twig */
class __TwigTemplate_415768a6a646b78adf8333c79968e6ee8062cd39e0d419768f14836d67531112 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("banner.html.twig", "homepageform.html.twig", 1);
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <div id=\"page-content-div\">
        <h3>";
        // line 4
        echo twig_escape_filter($this->env, ($context["page_heading_2"] ?? null), "html", null, true);
        echo "</h3>
        <h4>";
        // line 5
        echo twig_escape_filter($this->env, ($context["sid_text"] ?? null), "html", null, true);
        echo twig_escape_filter($this->env, ($context["sid"] ?? null), "html", null, true);
        echo "</h4>
        <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" method=\"post\">
            <fieldset>
                <legend>Details for storage</legend>
                <br>
                <label for=\"username\">Enter your name:</label>
                <input id=\"username\" name=\"username\" type=\"text\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["initial_input_box_value"] ?? null), "html", null, true);
        echo "\" size=\"30\" maxlength=\"50\">
                <br><br>
                <label for=\"password\">Enter your password:</label>
                <input id=\"password\" name=\"password\" type=\"password\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["initial_input_box_value"] ?? null), "html", null, true);
        echo "\" size=\"30\" maxlength=\"50\">
                <br><br>
                <h3>";
        // line 16
        echo twig_escape_filter($this->env, ($context["page_heading_3"] ?? null), "html", null, true);
        echo "</h3>
                <label for=\"server_type\">Choose your storage type:</label>
                <input id=\"server_type\" name=\"server_type\" type=\"radio\" value=\"file\" checked=\"checked\"/>Session File
                <input id=\"server_type\" name=\"server_type\" type=\"radio\" value=\"database\"/>Database
                <br><br>
                <input type=\"submit\" value=\"Store the information >>>\">
            </fieldset>
        </form>
        <p class=\"curr_page\"><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["landing_page"] ?? null), "html", null, true);
        echo "\">Home</a></p>
    </div>
";
    }

    public function getTemplateName()
    {
        return "homepageform.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 24,  62 => 16,  57 => 14,  51 => 11,  43 => 6,  38 => 5,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "homepageform.html.twig", "/p3t/phpappfolder/includes/app/templates/homepageform.html.twig");
    }
}
