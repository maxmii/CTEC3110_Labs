<?php

/* register_user_result.html.twig */
class __TwigTemplate_2ff3cac47b3674558a51b3a38a7f8ea715f3e908fb15732e48c06f240309ad1a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("banner.html.twig", "register_user_result.html.twig", 1);
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
        <h4>Original text entries:</h4>
        <p>Entered user name: ";
        // line 7
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "</p>
        <p>Entered password: ";
        // line 8
        echo twig_escape_filter($this->env, ($context["password"] ?? null), "html", null, true);
        echo "</p>
        <p>Entered email: ";
        // line 9
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "</p>
        <p>Entered dietary requirements: ";
        // line 10
        echo twig_escape_filter($this->env, ($context["requirements"] ?? null), "html", null, true);
        echo "</p>

        <h4>Cleaned text entries:</h4>
        <p>Entered user name: ";
        // line 13
        echo twig_escape_filter($this->env, ($context["sanitised_username"] ?? null), "html", null, true);
        echo "</p>
        <p>Entered password: ";
        // line 14
        echo twig_escape_filter($this->env, ($context["cleaned_password"] ?? null), "html", null, true);
        echo "</p>
        <p>Entered email: ";
        // line 15
        echo twig_escape_filter($this->env, ($context["sanitised_email"] ?? null), "html", null, true);
        echo "</p>
        <p>Entered requirements: ";
        // line 16
        echo twig_escape_filter($this->env, ($context["sanitised_requirements"] ?? null), "html", null, true);
        echo "</p>

        <h4>Hashed values:</h4>
        <p>NB Values were hashed with the BCrypt library</p>
        <p>Hashed password: ";
        // line 20
        echo twig_escape_filter($this->env, ($context["hashed_password"] ?? null), "html", null, true);
        echo "</p>

        <h4>Encrypted text entries:</h4>
        <p>Encrypted user name: ";
        // line 23
        echo twig_escape_filter($this->env, ($context["encrypted_username"] ?? null), "html", null, true);
        echo "</p>
        <p>Encrypted email: ";
        // line 24
        echo twig_escape_filter($this->env, ($context["encrypted_email"] ?? null), "html", null, true);
        echo "</p>
        <p>Encrypted requirements: ";
        // line 25
        echo twig_escape_filter($this->env, ($context["encrypted_requirements"] ?? null), "html", null, true);
        echo "</p>

        <h4>Base64 Encoded strings from the encrypted entries:</h4>
        <p>Encoded user name: ";
        // line 28
        echo twig_escape_filter($this->env, ($context["encoded_username"] ?? null), "html", null, true);
        echo "</p>
        <p>Encoded email: ";
        // line 29
        echo twig_escape_filter($this->env, ($context["encoded_email"] ?? null), "html", null, true);
        echo "</p>
        <p>Encoded requirements: ";
        // line 30
        echo twig_escape_filter($this->env, ($context["encoded_requirements"] ?? null), "html", null, true);
        echo "</p>

        <p class=\"curr_page\"><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, ($context["landing_page"] ?? null), "html", null, true);
        echo "\">Home</a></p>
    </div>
";
    }

    public function getTemplateName()
    {
        return "register_user_result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 32,  109 => 30,  105 => 29,  101 => 28,  95 => 25,  91 => 24,  87 => 23,  81 => 20,  74 => 16,  70 => 15,  66 => 14,  62 => 13,  56 => 10,  52 => 9,  48 => 8,  44 => 7,  38 => 5,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "register_user_result.html.twig", "/p3t/phpappfolder/includes/encryption_and_hashing/app/templates/register_user_result.html.twig");
    }
}
