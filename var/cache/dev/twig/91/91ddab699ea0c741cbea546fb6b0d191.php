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

/* test.html.twig */
class __TwigTemplate_f900c5153a9d18614b8881e5cd53befe extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "test.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "test.html.twig"));

        // line 1
        yield "<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Create a movie</title>
    <link rel=\"stylesheet\" href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        yield "\">
</head>

<h1>Page home</h1>




<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Synopsis</th>
            <th>Release Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["movies"]) || array_key_exists("movies", $context) ? $context["movies"] : (function () { throw new RuntimeError('Variable "movies" does not exist.', 25, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
            // line 26
            yield "        <tr>
            <th>";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getId", [], "any", false, false, false, 27), "html", null, true);
            yield "</th>
            <th>";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getName", [], "any", false, false, false, 28), "html", null, true);
            yield "</th>

            <th>";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getSynopsis", [], "any", false, false, false, 30), "html", null, true);
            yield "</th>
            <th>";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getReleaseDate", [], "any", false, false, false, 31)), "html", null, true);
            yield "</th>
            <th> <a href=\"movies/update/";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getId", [], "any", false, false, false, 32), "html", null, true);
            yield "\"> Update </a></th>
            <th> <a href=\"movies/delete/";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["movie"], "getId", [], "any", false, false, false, 33), "html", null, true);
            yield "\"> Delete </a></th>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['movie'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        yield "

    </tbody>



</table>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "test.html.twig";
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
        return array (  114 => 36,  105 => 33,  101 => 32,  97 => 31,  93 => 30,  88 => 28,  84 => 27,  81 => 26,  77 => 25,  54 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Create a movie</title>
    <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\">
</head>

<h1>Page home</h1>




<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Synopsis</th>
            <th>Release Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        {% for movie in movies %}
        <tr>
            <th>{{ movie.getId }}</th>
            <th>{{ movie.getName }}</th>

            <th>{{ movie.getSynopsis }}</th>
            <th>{{ movie.getReleaseDate | date }}</th>
            <th> <a href=\"movies/update/{{ movie.getId }}\"> Update </a></th>
            <th> <a href=\"movies/delete/{{ movie.getId }}\"> Delete </a></th>
        </tr>
        {% endfor %}


    </tbody>



</table>", "test.html.twig", "C:\\Users\\Maceo's laptop\\Desktop\\projet\\v1\\templates\\test.html.twig");
    }
}
