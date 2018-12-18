<?php

/* homepageform.html.twig */
class __TwigTemplate_6e482293de76ee6bf4322c086578ecd23856162240d09801108cd54d63c4f1ca extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "homepageform.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <div id=\"page-content-div\">
        <h2>";
        // line 4
        echo twig_escape_filter($this->env, ($context["page_heading_2"] ?? null), "html", null, true);
        echo "</h2>
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
                <legend>Login Page</legend>
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
                <br>
                <h4>";
        // line 16
        echo twig_escape_filter($this->env, ($context["page_heading_3"] ?? null), "html", null, true);
        echo "</h4>
                <input type=\"submit\" value=\"Login >>>\">
            </fieldset>
        </form>
        <p class=\"curr_page\"><a href=\"";
        // line 20
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
        return array (  73 => 20,  66 => 16,  61 => 14,  55 => 11,  47 => 6,  42 => 5,  38 => 4,  35 => 3,  32 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "homepageform.html.twig", "H:\\p3t\\phpappfolder\\includes\\Assessment\\app\\Templates\\homepageform.html.twig");
    }
}
