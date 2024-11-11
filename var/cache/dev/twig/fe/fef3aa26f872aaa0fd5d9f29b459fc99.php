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

/* login.html.twig */
class __TwigTemplate_398304b13ebcbd5fd35e8527b60ed63a extends Template
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

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Mon Site de Streaming</title>
    ";
        // line 7
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 10
        yield "</head>
<body>
<!-- Barre de navigation -->
<nav class=\"navbar\">
    <div class=\"logo\">MonFlix</div>
    <ul class=\"nav-links\">
        <li><a href=\"#\">Accueil</a></li>
        <li><a href=\"#\">Séries</a></li>
        <li><a href=\"#\">Films</a></li>
        <li><a href=\"#\">Nouveautés</a></li>
        <li><a href=\"#\">Créer un compte</a></li>

    </ul>
</nav>
<div class=\"container\">
    <h1>Bienvenue</h1>

    <div class=\"form-toggle-btns\">
        <button onclick=\"showLoginForm()\">Connexion</button>
        <button onclick=\"showRegisterForm()\">Inscription</button>
    </div>

    ";
        // line 33
        yield "    <div id=\"login-form\" class=\"form-container active\">
        <h2>Se connecter</h2>
        <form action=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" method=\"post\">
            <div>
                <label for=\"username\">Email :</label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"\" required autofocus>
            </div>

            <div>
                <label for=\"password\">Mot de passe :</label>
                <input type=\"password\" id=\"password\" name=\"_password\" required>
            </div>

            <button type=\"submit\">Se connecter</button>
        </form>
    </div>

    ";
        // line 51
        yield "    <div id=\"register-form\" class=\"form-container\">
        ";
        // line 52
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 52, $this->source); })()), 'form_start');
        yield "
        ";
        // line 53
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 53, $this->source); })()), 'widget');
        yield "
        <button type=\"submit\">S'inscrire</button>
        ";
        // line 55
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 55, $this->source); })()), 'form_end');
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
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        yield "        <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        yield "\">
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
        return "login.html.twig";
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
        return array (  164 => 8,  151 => 7,  117 => 55,  112 => 53,  108 => 52,  105 => 51,  87 => 35,  83 => 33,  59 => 10,  57 => 7,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Mon Site de Streaming</title>
    {% block stylesheets %}
        <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\">
    {% endblock %}
</head>
<body>
<!-- Barre de navigation -->
<nav class=\"navbar\">
    <div class=\"logo\">MonFlix</div>
    <ul class=\"nav-links\">
        <li><a href=\"#\">Accueil</a></li>
        <li><a href=\"#\">Séries</a></li>
        <li><a href=\"#\">Films</a></li>
        <li><a href=\"#\">Nouveautés</a></li>
        <li><a href=\"#\">Créer un compte</a></li>

    </ul>
</nav>
<div class=\"container\">
    <h1>Bienvenue</h1>

    <div class=\"form-toggle-btns\">
        <button onclick=\"showLoginForm()\">Connexion</button>
        <button onclick=\"showRegisterForm()\">Inscription</button>
    </div>

    {# Formulaire de Connexion #}
    <div id=\"login-form\" class=\"form-container active\">
        <h2>Se connecter</h2>
        <form action=\"{{ path('app_login') }}\" method=\"post\">
            <div>
                <label for=\"username\">Email :</label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"\" required autofocus>
            </div>

            <div>
                <label for=\"password\">Mot de passe :</label>
                <input type=\"password\" id=\"password\" name=\"_password\" required>
            </div>

            <button type=\"submit\">Se connecter</button>
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
</body>
</html>
", "login.html.twig", "C:\\Users\\Maceo's laptop\\Desktop\\projet\\v1\\templates\\login.html.twig");
    }
}
