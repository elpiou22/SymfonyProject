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
class __TwigTemplate_81c679662f8cf4c80357874ef640b6f5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        $this->parent = $this->loadTemplate("./layouts/base.html.twig", "home.html.twig", 1);
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

        yield " Home ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from         $this->loadTemplate("./layouts/navbar.html.twig", "home.html.twig", 6)->unwrap()->yield($context);
        // line 7
        yield "
    <section class=\"banner\">
        <div class=\"banner-content\">
            <h1>Film du Moment</h1>
            <p>Regardez le dernier film à succès dès maintenant !</p>
            <button>Lire</button>
            <button>Ajouter à Ma Liste</button>
        </div>
    </section>

    <section class=\"categories\">
        <table class=\"movie-table\">
            <thead>
            <tr>
                <th>Affiche</th>
                <th>Titre</th>
                <th>Synopsis</th>
                <th>Date de sortie</th>
                ";
        // line 25
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 26
            yield "                    <th>Actions</th>
                ";
        }
        // line 28
        yield "            </tr>
            </thead>
            <tbody>
            ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["movies"]) || array_key_exists("movies", $context) ? $context["movies"] : (function () { throw new RuntimeError('Variable "movies" does not exist.', 31, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
            // line 32
            yield "                <tr class=\"movie-row\">
                    <td>
                        <img style=\"max-height: 200px; max-width: 200px; height: auto; width: auto\" src=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image_path"]) || array_key_exists("image_path", $context) ? $context["image_path"] : (function () { throw new RuntimeError('Variable "image_path" does not exist.', 34, $this->source); })())), "html", null, true);
            yield "\" alt=\"Film ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getName", [], "any", false, false, false, 34), "html", null, true);
            yield "\">
                    </td>
                    <td>";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getName", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
                    <td>";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getSynopsis", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
                    <td>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getReleaseDate", [], "any", false, false, false, 38), "d-m-Y"), "html", null, true);
            yield "</td>
                    ";
            // line 39
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 40
                yield "                        <td>
                            <a href=\"";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_movie_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getId", [], "any", false, false, false, 41)]), "html", null, true);
                yield "\">Update</a> |
                            <form action=\"";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_movie_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getId", [], "any", false, false, false, 42)]), "html", null, true);
                yield "\" method=\"post\" style=\"display:inline;\">
                                <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                                <button type=\"submit\" onclick=\"return confirm('Are you sure you want to delete this movie?');\">Delete</button>
                            </form>
                        </td>
                    ";
            }
            // line 48
            yield "
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['movie'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        yield "            </tbody>
        </table>
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
        return array (  187 => 51,  179 => 48,  170 => 42,  166 => 41,  163 => 40,  161 => 39,  157 => 38,  153 => 37,  149 => 36,  142 => 34,  138 => 32,  134 => 31,  129 => 28,  125 => 26,  123 => 25,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends './layouts/base.html.twig' %}

{% block title %} Home {% endblock title %}

{% block body %}
    {% include './layouts/navbar.html.twig' %}

    <section class=\"banner\">
        <div class=\"banner-content\">
            <h1>Film du Moment</h1>
            <p>Regardez le dernier film à succès dès maintenant !</p>
            <button>Lire</button>
            <button>Ajouter à Ma Liste</button>
        </div>
    </section>

    <section class=\"categories\">
        <table class=\"movie-table\">
            <thead>
            <tr>
                <th>Affiche</th>
                <th>Titre</th>
                <th>Synopsis</th>
                <th>Date de sortie</th>
                {% if is_granted(\"ROLE_ADMIN\") %}
                    <th>Actions</th>
                {% endif %}
            </tr>
            </thead>
            <tbody>
            {% for movie in movies %}
                <tr class=\"movie-row\">
                    <td>
                        <img style=\"max-height: 200px; max-width: 200px; height: auto; width: auto\" src=\"{{ asset(image_path) }}\" alt=\"Film {{ movie.getName }}\">
                    </td>
                    <td>{{ movie.getName }}</td>
                    <td>{{ movie.getSynopsis }}</td>
                    <td>{{ movie.getReleaseDate|date('d-m-Y') }}</td>
                    {% if is_granted(\"ROLE_ADMIN\") %}
                        <td>
                            <a href=\"{{ path('app_movie_update', { id: movie.getId }) }}\">Update</a> |
                            <form action=\"{{ path('app_movie_delete', { id: movie.getId }) }}\" method=\"post\" style=\"display:inline;\">
                                <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                                <button type=\"submit\" onclick=\"return confirm('Are you sure you want to delete this movie?');\">Delete</button>
                            </form>
                        </td>
                    {% endif %}

                </tr>
            {% endfor %}
            </tbody>
        </table>
    </section>


{% endblock body %}", "home.html.twig", "C:\\Users\\amaury\\Documents\\B2\\PHP\\Projet\\SymfonyProject\\templates\\home.html.twig");
    }
}
