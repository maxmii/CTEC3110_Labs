<?php

/* register_user_result.html.twig */
class __TwigTemplate_2900984f2ff3843fc85cb04cb183eacbd9ec555056b845caa790caf548d3e01e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

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
        <p>Entered dietary requirements: ";
        // line 16
        echo twig_escape_filter($this->env, ($context["sanitised_requirements"] ?? null), "html", null, true);
        echo "</p>

        <h4>Hashed Password:</h4>
        <p>NB The password was hashed with the BCrypt library</p>
        <p>Hashed password: ";
        // line 20
        echo twig_escape_filter($this->env, ($context["hashed_password"] ?? null), "html", null, true);
        echo "</p>

        <h4>Encrypted text entries:</h4>
        <p>NB The libsodium library version used is ";
        // line 23
        echo twig_escape_filter($this->env, ($context["libsodium_version"] ?? null), "html", null, true);
        echo "</p>
        <p>Nonce used to encrypt user name: ";
        // line 24
        echo twig_escape_filter($this->env, ($context["nonce_value_username"] ?? null), "html", null, true);
        echo "</p>
        <p>Encrypted user name: ";
        // line 25
        echo twig_escape_filter($this->env, ($context["encrypted_username"] ?? null), "html", null, true);
        echo "</p>
        <p>Nonce used to encrypt email: ";
        // line 26
        echo twig_escape_filter($this->env, ($context["nonce_value_email"] ?? null), "html", null, true);
        echo "</p>
        <p>Encrypted email: ";
        // line 27
        echo twig_escape_filter($this->env, ($context["encrypted_email"] ?? null), "html", null, true);
        echo "</p>
        <p>Nonce used to encrypt dietary requirements: ";
        // line 28
        echo twig_escape_filter($this->env, ($context["nonce_value_dietary_requirements"] ?? null), "html", null, true);
        echo "</p>
        <p>Encrypted dietary requirements: ";
        // line 29
        echo twig_escape_filter($this->env, ($context["encrypted_requirements"] ?? null), "html", null, true);
        echo "</p>

        <h4>Base64 Encoded strings from the encrypted entries:</h4>
        <p>Encoded user name: ";
        // line 32
        echo twig_escape_filter($this->env, ($context["encoded_username"] ?? null), "html", null, true);
        echo "</p>
        <p>Encoded email: ";
        // line 33
        echo twig_escape_filter($this->env, ($context["encoded_email"] ?? null), "html", null, true);
        echo "</p>
        <p>Encoded dietary requirements: ";
        // line 34
        echo twig_escape_filter($this->env, ($context["encoded_requirements"] ?? null), "html", null, true);
        echo "</p>

        <h4>Decrypted Strings:</h4>
        <p>Decrypted user name: ";
        // line 37
        echo twig_escape_filter($this->env, ($context["decrypted_username"] ?? null), "html", null, true);
        echo "</p>
        <p>Decrypted email: ";
        // line 38
        echo twig_escape_filter($this->env, ($context["decrypted_email"] ?? null), "html", null, true);
        echo "</p>
        <p>Decrypted dietary requirements: ";
        // line 39
        echo twig_escape_filter($this->env, ($context["decrypted_dietary_requirements"] ?? null), "html", null, true);
        echo "</p>

        <p class=\"curr_page\"><a href=\"";
        // line 41
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
        return array (  148 => 41,  143 => 39,  139 => 38,  135 => 37,  129 => 34,  125 => 33,  121 => 32,  115 => 29,  111 => 28,  107 => 27,  103 => 26,  99 => 25,  95 => 24,  91 => 23,  85 => 20,  78 => 16,  74 => 15,  70 => 14,  66 => 13,  60 => 10,  56 => 9,  52 => 8,  48 => 7,  42 => 5,  38 => 4,  35 => 3,  32 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "register_user_result.html.twig", "/p3t/phpappfolder/includes/encryption_and_hashing/app/templates/register_user_result.html.twig");
    }
}
