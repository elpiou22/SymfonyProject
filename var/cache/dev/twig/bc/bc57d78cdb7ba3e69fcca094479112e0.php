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

/* ./layouts/navbar.html.twig */
class __TwigTemplate_25cc5611e1b24eea45d34210f8f328c6 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "./layouts/navbar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "./layouts/navbar.html.twig"));

        // line 1
        yield "
<nav class=\"navbar\">
    <div class=\"logo\">MonFlix</div>
    <ul class=\"nav-links\">
        <li><a href=\"";
        // line 5
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Accueil</a></li>
        <li><a href=\"\">Séries</a></li>
        <li><a href=\"\">Films</a></li>
        ";
        // line 8
        if ( !($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER"))) {
            // line 9
            yield "            <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_signin");
            yield "\">Se connecter</a></li>
            <li><a href=\"";
            // line 10
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_signin");
            yield "\">Créer un compte</a></li>
        ";
        } else {
            // line 12
            yield "            <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\">Profil</a></li>
            <li><a href=\"";
            // line 13
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\">Se déconnecter</a></li>
        ";
        }
        // line 15
        yield "        ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 16
            yield "            <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_create");
            yield "\">Ajouter un film</a></li>
        ";
        }
        // line 18
        yield "    </ul>
</nav>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "./layouts/navbar.html.twig";
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
        return array (  91 => 18,  85 => 16,  82 => 15,  77 => 13,  72 => 12,  67 => 10,  62 => 9,  60 => 8,  54 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
<nav class=\"navbar\">
    <div class=\"logo\">MonFlix</div>
    <ul class=\"nav-links\">
        <li><a href=\"{{ path('home') }}\">Accueil</a></li>
        <li><a href=\"\">Séries</a></li>
        <li><a href=\"\">Films</a></li>
        {% if not(is_granted(\"ROLE_ADMIN\") or is_granted(\"ROLE_USER\")) %}
            <li><a href=\"{{ path('app_signin') }}\">Se connecter</a></li>
            <li><a href=\"{{ path('app_signin') }}\">Créer un compte</a></li>
        {% else %}
            <li><a href=\"{{ path('app_profile') }}\">Profil</a></li>
            <li><a href=\"{{ path('app_logout') }}\">Se déconnecter</a></li>
        {% endif %}
        {% if (is_granted(\"ROLE_ADMIN\")) %}
            <li><a href=\"{{ path('app_create') }}\">Ajouter un film</a></li>
        {% endif %}
    </ul>
</nav>
", "./layouts/navbar.html.twig", "C:\\Users\\amaury\\Documents\\B2\\PHP\\Projet\\SymfonyProject\\templates\\layouts\\navbar.html.twig");
    }
}
