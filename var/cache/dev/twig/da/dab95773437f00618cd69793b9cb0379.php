<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* security/login.html.twig */
class __TwigTemplate_9368a11178dba3455fd18c68c4f18358 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "./layouts/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->loadTemplate("./layouts/base.html.twig", "security/login.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield " Login ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        yield "    ";
        yield from         $this->loadTemplate("./layouts/navbar.html.twig", "security/login.html.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "

<div class=\"container\">
    <h1>Bienvenue</h1>

    <div class=\"form-toggle-btns\">
        <button style=\"background-color: #555555\" onclick=\"showLoginForm()\">Connexion</button>
        <button style=\"background-color: #555555\" onclick=\"showRegisterForm()\">Inscription</button>
    </div>

    ";
        // line 19
        yield "    <div id=\"login-form\" class=\"form-container active\">
        <h2>Se connecter</h2>
        <form action=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_signin");
        yield "\" method=\"post\">
            <div>
                <label for=\"username\">Email :</label>
                <input style=\"background-color: #555555\" type=\"text\" id=\"username\" name=\"registration_form[email]\" value=\"\" required autofocus>
            </div>

            <div>
                <label for=\"password\">Mot de passe :</label>
                <input style=\"background-color: #555555\" type=\"password\" id=\"password\" name=\"_password\" required>
            </div>
            <input type=\"hidden\" name=\"_csrf_token\"
                   value=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\"
            >
            <button style=\"background-color: #555555\" type=\"submit\">Se connecter</button>
        </form>
    </div>

    ";
        // line 39
        yield "    <div id=\"register-form\" class=\"form-container\">
        ";
        // line 40
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 40, $this->source); })()), 'form_start');
        yield "
        ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 41, $this->source); })()), 'widget');
        yield "
        <button type=\"submit\">S'inscrire</button>
        ";
        // line 43
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 43, $this->source); })()), 'form_end');
        yield "
    </div>
</div>




<script>
    function showLoginForm() {
        document.getElementById('login-form').classList.add('active');
        document.getElementById('register-form').classList.remove('active');
        console.log(\"show login form\");
    }

    function showRegisterForm() {
        document.getElementById('register-form').classList.add('active');
        document.getElementById('login-form').classList.remove('active');
        console.log(\"show register form\")
    }
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "security/login.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  154 => 43,  149 => 41,  145 => 40,  142 => 39,  133 => 32,  119 => 21,  115 => 19,  103 => 8,  100 => 7,  87 => 6,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends './layouts/base.html.twig' %}

{% block title %} Login {% endblock title %}


{% block body %}
    {% include './layouts/navbar.html.twig' %}


<div class=\"container\">
    <h1>Bienvenue</h1>

    <div class=\"form-toggle-btns\">
        <button style=\"background-color: #555555\" onclick=\"showLoginForm()\">Connexion</button>
        <button style=\"background-color: #555555\" onclick=\"showRegisterForm()\">Inscription</button>
    </div>

    {# Formulaire de Connexion #}
    <div id=\"login-form\" class=\"form-container active\">
        <h2>Se connecter</h2>
        <form action=\"{{ path('app_signin') }}\" method=\"post\">
            <div>
                <label for=\"username\">Email :</label>
                <input style=\"background-color: #555555\" type=\"text\" id=\"username\" name=\"registration_form[email]\" value=\"\" required autofocus>
            </div>

            <div>
                <label for=\"password\">Mot de passe :</label>
                <input style=\"background-color: #555555\" type=\"password\" id=\"password\" name=\"_password\" required>
            </div>
            <input type=\"hidden\" name=\"_csrf_token\"
                   value=\"{{ csrf_token('authenticate') }}\"
            >
            <button style=\"background-color: #555555\" type=\"submit\">Se connecter</button>
        </form>
    </div>

    {# Formulaire d'Inscription #}
    <div id=\"register-form\" class=\"form-container\">
        {{ form_start(registrationForm) }}
        {{ form_widget(registrationForm) }}
        <button type=\"submit\">S'inscrire</button>
        {{ form_end(registrationForm) }}
    </div>
</div>




<script>
    function showLoginForm() {
        document.getElementById('login-form').classList.add('active');
        document.getElementById('register-form').classList.remove('active');
        console.log(\"show login form\");
    }

    function showRegisterForm() {
        document.getElementById('register-form').classList.add('active');
        document.getElementById('login-form').classList.remove('active');
        console.log(\"show register form\")
    }
</script>
{% endblock body %}
", "security/login.html.twig", "C:\\Users\\Maceo's laptop\\Desktop\\projet\\v1\\templates\\security\\login.html.twig");
    }
}
