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

/* home.html.twig */
class __TwigTemplate_152980676e76a6ad0f049589b4a038b7 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "navbar.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        $this->parent = $this->loadTemplate("navbar.html.twig", "home.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 14
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 15
        yield "    <section class=\"categories\">
        <div class=\"movie-row\">
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["movies"]) || array_key_exists("movies", $context) ? $context["movies"] : (function () { throw new RuntimeError('Variable "movies" does not exist.', 17, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
            // line 18
            yield "                <div class=\"movie-item\">
                    <img src=\"";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image_path"]) || array_key_exists("image_path", $context) ? $context["image_path"] : (function () { throw new RuntimeError('Variable "image_path" does not exist.', 19, $this->source); })())), "html", null, true);
            yield "\" alt=\"Film ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getName", [], "any", false, false, false, 19), "html", null, true);
            yield "\">
                    <h3>";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getName", [], "any", false, false, false, 20), "html", null, true);
            yield "</h3>
                    <p>";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getSynopsis", [], "any", false, false, false, 21), "html", null, true);
            yield "</p>
                    <p>Sortie : ";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getReleaseDate", [], "any", false, false, false, 22), "d-m-Y"), "html", null, true);
            yield "</p>
                    ";
            // line 23
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 24
                yield "                        <th> <a href=\"movies/update/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getId", [], "any", false, false, false, 24), "html", null, true);
                yield "\"> Update </a></th>
                        <th> <a href=\"movies/delete/";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getId", [], "any", false, false, false, 25), "html", null, true);
                yield "\"> Delete </a></th>
                    ";
            }
            // line 27
            yield "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['movie'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "        </div>
    </section>
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
        return "home.html.twig";
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
        return array (  124 => 29,  117 => 27,  112 => 25,  107 => 24,  105 => 23,  101 => 22,  97 => 21,  93 => 20,  87 => 19,  84 => 18,  80 => 17,  76 => 15,  63 => 14,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'navbar.html.twig' %}

{# {% block title %}Accueil - Mon Site de Streaming{% endblock %}
<!-- Bannière principale -->
<!--<section class=\"banner\">
    <div class=\"banner-content\">
        <h1>Film du Moment</h1>
        <p>Regardez le dernier film à succès dès maintenant !</p>
        <button>Lire</button>
        <button>Ajouter à Ma Liste</button>
    </div>
</section> -->#}

{% block content %}
    <section class=\"categories\">
        <div class=\"movie-row\">
            {% for movie in movies %}
                <div class=\"movie-item\">
                    <img src=\"{{ asset(image_path) }}\" alt=\"Film {{ movie.getName }}\">
                    <h3>{{ movie.getName }}</h3>
                    <p>{{ movie.getSynopsis }}</p>
                    <p>Sortie : {{ movie.getReleaseDate|date('d-m-Y') }}</p>
                    {% if is_granted(\"ROLE_ADMIN\") %}
                        <th> <a href=\"movies/update/{{ movie.getId }}\"> Update </a></th>
                        <th> <a href=\"movies/delete/{{ movie.getId }}\"> Delete </a></th>
                    {%  endif %}
                </div>
            {% endfor %}
        </div>
    </section>
{% endblock %}

", "home.html.twig", "C:\\Users\\Maceo's laptop\\Desktop\\projet\\v1\\templates\\home.html.twig");
    }
}
