<?php

/* homepageform.html.twig */
class __TwigTemplate_b94e919f0cd3a2baab79a96c3d21cfd2ecc2ed8224e61dcf536e63533d1752cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "homepageform.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ($context["page_title"] ?? null), "html", null, true);
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <body>
    <div id=\"banner-div\">
        <h1>";
        // line 6
        echo twig_escape_filter($this->env, ($context["page_heading_1"] ?? null), "html", null, true);
        echo "</h1>
        <p class=\"cent\">
            Page last updated on <script type=\"text/javascript\">document.write(document.lastModified)</script>
            <br>
            Maintained by <a href=\"mailto:cfi@dmu.ac.uk\">cfi@dmu.ac.uk</a>
        </p>
        <hr class=\"deepline\"/>
    </div>
    <div id=\"clear-div\"></div>
    <div id=\"page-content-div\">
        <h3>";
        // line 16
        echo twig_escape_filter($this->env, ($context["page_heading_2"] ?? null), "html", null, true);
        echo "</h3>
        <h4>";
        // line 17
        echo twig_escape_filter($this->env, ($context["sid_text"] ?? null), "html", null, true);
        echo twig_escape_filter($this->env, ($context["sid"] ?? null), "html", null, true);
        echo "</h4>
        <form action=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" method=\"post\">
            <fieldset>
                <legend>Details for storage</legend>
                <br>
                <label for=\"username\">Enter your name:</label>
                <input id=\"username\" name=\"username\" type=\"text\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["initial_input_box_value"] ?? null), "html", null, true);
        echo "\" size=\"30\" maxlength=\"30\">
                <br><br>
                <label for=\"password\">Enter your password:</label>
                <input id=\"password\" name=\"password\" type=\"password\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, ($context["initial_input_box_value"] ?? null), "html", null, true);
        echo "\" size=\"30\" maxlength=\"30\">
                <br><br>
                <h3>";
        // line 28
        echo twig_escape_filter($this->env, ($context["page_heading_3"] ?? null), "html", null, true);
        echo "</h3>
                <label for=\"storage_type\">Choose your storage type:</label>
                <input id=\"server_type\" name=\"server_type\" type=\"radio\" value=\"file\" checked=\"checked\"/>Session File
                <input id=\"server_type\" name=\"server_type\" type=\"radio\" value=\"database\">Database
                <br><br>
                <input type=\"submit\" value=\"Store the information >>>\">
            </fieldset>
        </form>
        <p class=\"curr_page\"><a href=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["landing_page"] ?? null), "html", null, true);
        echo "\">Home</a></p>
    </div>
    </body>
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
        return array (  94 => 36,  83 => 28,  78 => 26,  72 => 23,  64 => 18,  59 => 17,  55 => 16,  42 => 6,  38 => 4,  35 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "homepageform.html.twig", "/p3t/phpappfolder/includes/sessions_example/templates/homepageform.html.twig");
    }
}
