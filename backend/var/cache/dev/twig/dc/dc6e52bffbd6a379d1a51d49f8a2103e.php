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

/* @WebProfiler/Collector/form.html.twig */
class __TwigTemplate_1111eebd1b923bf9df3d73c85964afd7 extends Template
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
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'head' => [$this, 'block_head'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/form.html.twig"));

        // line 3
        $macros["_v0"] = $this->macros["_v0"] = $this;
        // line 1
        $this->parent = $this->load("@WebProfiler/Profiler/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 6
        yield "    ";
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 6), "nb_errors", [], "any", false, false, false, 6) > 0) || Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 6), "forms", [], "any", false, false, false, 6)))) {
            // line 7
            yield "        ";
            $context["status_color"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 7), "nb_errors", [], "any", false, false, false, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("red") : (""));
            // line 8
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 9
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/form.svg");
                yield "
            <span class=\"sf-toolbar-value\">
                ";
                // line 11
                yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 11), "nb_errors", [], "any", false, false, false, 11)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 11), "nb_errors", [], "any", false, false, false, 11), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 11), "forms", [], "any", false, false, false, 11)), "html", null, true)));
                yield "
            </span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 14
            yield "
        ";
            // line 15
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 16
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Number of forms</b>
                <span class=\"sf-toolbar-status\">";
                // line 18
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 18), "forms", [], "any", false, false, false, 18)), "html", null, true);
                yield "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Number of errors</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
                // line 22
                yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 22), "nb_errors", [], "any", false, false, false, 22) > 0)) ? ("red") : (""));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 22), "nb_errors", [], "any", false, false, false, 22), "html", null, true);
                yield "</span>
            </div>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 25
            yield "
        ";
            // line 26
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null), "status" => ($context["status_color"] ?? null)]);
            yield "
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 31
        yield "    <span class=\"label label-status-";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 31), "nb_errors", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("error") : (""));
        yield " ";
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 31), "forms", [], "any", false, false, false, 31))) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 32
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/form.svg");
        yield "</span>
        <strong>Forms</strong>
        ";
        // line 34
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 34), "nb_errors", [], "any", false, false, false, 34) > 0)) {
            // line 35
            yield "            <span class=\"count\">
                <span>";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 36), "nb_errors", [], "any", false, false, false, 36), "html", null, true);
            yield "</span>
            </span>
        ";
        }
        // line 39
        yield "    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        // line 43
        yield "    ";
        yield from $this->yieldParentBlock("head", $context, $blocks);
        yield "

    <style>
        #tree-menu {
            float: left;
            padding-right: 10px;
            width: 230px;
        }
        #tree-menu ul {
            list-style: none;
            margin: 0;
            padding-left: 0;
        }
        #tree-menu li {
            margin: 0;
            padding: 0;
            width: 100%;
        }
        #tree-menu .empty {
            border: 0;
            padding: 0;
        }
        #tree-details-container {
            border-left: 1px solid #DDD;
            margin-left: 250px;
            padding-left: 20px;
        }
        .tree-details {
            padding-bottom: 40px;
        }
        .tree-details h3 {
            font-size: 18px;
            position: relative;
        }

        .toggle-icon {
            display: inline-block;
            background: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAgBAMAAADpp+X/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QweDgwx4LcKwAAAABVQTFRFAAAA////////////////ZmZm////bvjBwAAAAAV0Uk5TABZwsuCVEUjgAAAAAWJLR0QF+G/pxwAAAE1JREFUGNNjSHMSYGBgUEljSGYAAzMGBwiDhUEBwmBiEIAwGBmwgTQgQGWgA7h2uIFwK+CWwp1BpHvYEqDuATEYkBlY3IOmBq6dCPcAAIT5Eg2IksjQAAAAAElFTkSuQmCC\") no-repeat top left #5eb5e0;
        }
        .closed .toggle-icon, .closed.toggle-icon {
            background-position: bottom left;
        }
        .toggle-icon.empty {
            background-image: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAZgBmAGYHukptAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QweDhIf6CA40AAAAFRJREFUOMvtk7ENACEMA61vfx767MROWfO+AdGBHlNyTZrYUZRYDBII4NWE1pNdpFarfgLUbpDaBEgBYRiEVjsvDLa1l6O4Z3wkFWN+OfLKdpisOH/TlICzukmUJwAAAABJRU5ErkJggg==\");
        }

        .tree .tree-inner {
            cursor: pointer;
            padding: 5px 7px 5px 22px;
            position: relative;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .tree .toggle-button {
            /* provide a bigger clickable area than just 10x10px */
            width: 16px;
            height: 16px;
            margin-left: -18px;
        }
        .tree .toggle-icon {
            width: 10px;
            height: 10px;
            /* position the icon in the center of the clickable area */
            margin-left: 3px;
            margin-top: 3px;
            background-size: 10px 20px;
            background-color: #AAA;
        }
        .tree .toggle-icon.empty {
            width: 10px;
            height: 10px;
            position: absolute;
            top: 50%;
            margin-top: -5px;
            margin-left: -15px;
            background-size: 10px 10px;
        }
        .tree ul ul .tree-inner {
            padding-left: 37px;
        }
        .tree ul ul ul .tree-inner {
            padding-left: 52px;
        }
        .tree ul ul ul ul .tree-inner {
            padding-left: 67px;
        }
        .tree ul ul ul ul ul .tree-inner {
            padding-left: 82px;
        }
        .tree .tree-inner:hover {
            background: #dfdfdf;
        }
        .tree .tree-inner:hover span:not(.has-error) {
            color: var(--base-0);
        }
        .tree .tree-inner.active, .tree .tree-inner.active:hover {
            background: var(--tree-active-background);
            font-weight: bold;
        }
        .tree .tree-inner.active .toggle-icon, .tree .tree-inner:hover .toggle-icon, .tree .tree-inner.active:hover .toggle-icon {
            background-image: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAgBAMAAADpp+X/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QweDhEYXWn+sAAAABhQTFRFAAAA39/f39/f39/f39/fZmZm39/f////gc3YPwAAAAV0Uk5TAAtAc6ZeVyCYAAAAAWJLR0QF+G/pxwAAAE1JREFUGNNjSHMSYGBgUEljSGYAAzMGBwiDhUEBwmBiEIAwGBmwgXIgQGWgA7h2uIFwK+CWwp1BpHvYC6DuATEYkBlY3IOmBq6dCPcAADqLE4MnBi/fAAAAAElFTkSuQmCC\");
            background-color: #999;
        }
        .tree .tree-inner.active .toggle-icon.empty, .tree .tree-inner:hover .toggle-icon.empty, .tree .tree-inner.active:hover .toggle-icon.empty {
            background-image: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QweDhoucSey4gAAABVQTFRFAAAA39/f39/f39/f39/fZmZm39/fD5Dx2AAAAAV0Uk5TAAtAc6ZeVyCYAAAAAWJLR0QF+G/pxwAAADJJREFUCNdjSHMSYGBgUEljSGYAAzMGBwiDhUEBwmBiEIAwGBnIA3DtcAPhVsAthTkDAFOfBKW9C1iqAAAAAElFTkSuQmCC\");
        }
        .tree-details .toggle-icon {
            width: 16px;
            height: 16px;
            /* vertically center the button */
            position: absolute;
            top: 50%;
            margin-top: -9px;
            margin-left: 6px;
        }
        .badge-error {
            float: right;
            background: var(--background-error);
            color: #FFF;
            padding: 1px 4px;
            font-size: 10px;
            font-weight: bold;
            vertical-align: middle;
        }
        .has-error {
            color: var(--color-error);
        }
        .errors h3 {
            color: var(--color-error);
        }
        .errors th {
            background: var(--background-error);
            color: #FFF;
        }
        .errors .toggle-icon {
            background-color: var(--background-error);
        }
        h3 a, h3 a:hover, h3 a:focus {
            color: inherit;
            text-decoration: inherit;
        }
        h2 + h3.form-data-type {
            margin-top: 0;
        }
        h3.form-data-type + h3 {
            margin-top: 1em;
        }
        .theme-dark .toggle-icon {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAgBAMAAADpp+X/AAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAVUExURUdwTH+Ag0lNUZiYmGRmbP///zU5P2n9VV4AAAAFdFJOUwCv+yror0g1sQAAAE1JREFUGNNjSFM0YGBgEEpjSGEAAzcGBQiDiUEAwmBkMIAwmBmwgVAgQGWgA7h2uIFwK+CWwp1BpHtYA6DuATEYkBlY3IOmBq6dCPcAAKMtEEs3tfChAAAAAElFTkSuQmCC');
        }
        .theme-dark .toggle-icon.empty {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAASUExURUdwTDI3OzQ5PS4uLjU3PzU5P4keoyIAAAAFdFJOUwBApgtzrnKGEwAAADJJREFUCNdjCFU0YGBgEAplCGEAA1cGBQiDiUEAwmBkMIAwmBnIA3DtcAPhVsAthTkDACsZBBmrTTSxAAAAAElFTkSuQmCC');
        }
        .theme-dark .tree .tree-inner.active .toggle-icon, .theme-dark .tree .tree-inner:hover .toggle-icon, .theme-dark  .tree .tree-inner.active:hover .toggle-icon {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAgBAMAAADpp+X/AAAAD1BMVEVHcEx/gIOYmJiZmZn///+IJ2wIAAAAA3RSTlMAryoIUq0uAAAAUElEQVQY02NgYFQ2NjYWYGBgMAYDBgZmCMOAQRjCMGRQhjCMoEqAipAYLkCAykBXA9cONxBuBdxShDOIc4+JM9Q9IIYxMgOLe9DUwLUT4R4AznguG0qfEa0AAAAASUVORK5CYII=');
            background-color: transparent;
        }
        .theme-dark .tree .tree-inner.active .toggle-icon.empty, .theme-dark .tree .tree-inner:hover .toggle-icon.empty, .theme-dark  .tree .tree-inner.active:hover .toggle-icon.empty {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAgMAAABinRfyAAAACVBMVEVHcEwyNzuqqqrd9nIgAAAAAnRSTlMAQABPjKgAAAArSURBVAjXY2BctcqBgWvVqgUMWqtWrWDIWrVqJcMqICCGACsGawMbADIKANflJYEoGMqtAAAAAElFTkSuQmCC');
            background-color: transparent;
        }
    </style>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 207
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 208
        yield "    <h2>Forms</h2>

    ";
        // line 210
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 210), "forms", [], "any", false, false, false, 210))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 211
            yield "        <div id=\"tree-menu\" class=\"tree\">
            <ul>
            ";
            // line 213
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 213), "forms", [], "any", false, false, false, 213));
            foreach ($context['_seq'] as $context["formName"] => $context["formData"]) {
                // line 214
                yield "                ";
                yield $macros["_v0"]->getTemplateForMacro("macro_form_tree_entry", $context, 214, $this->getSourceContext())->macro_form_tree_entry(...[$context["formName"], $context["formData"], true]);
                yield "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['formName'], $context['formData'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 216
            yield "            </ul>
        </div>

        <div id=\"tree-details-container\">
            ";
            // line 220
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 220), "forms", [], "any", false, false, false, 220));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["formName"] => $context["formData"]) {
                // line 221
                yield "                ";
                yield $macros["_v0"]->getTemplateForMacro("macro_form_tree_details", $context, 221, $this->getSourceContext())->macro_form_tree_details(...[$context["formName"], $context["formData"], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, false, false, 221), "forms_by_hash", [], "any", false, false, false, 221), CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 221)]);
                yield "
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['formName'], $context['formData'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 223
            yield "        </div>
    ";
        } else {
            // line 225
            yield "        <div class=\"empty\">
            <p>No forms were submitted for this request.</p>
        </div>
    ";
        }
        // line 229
        yield "
    <script>
    function Toggler(storage) {
        \"use strict\";

        var STORAGE_KEY = 'sf_toggle_data',

            states = {},

            isCollapsed = function (button) {
                return Sfjs.hasClass(button, 'closed');
            },

            isExpanded = function (button) {
                return !isCollapsed(button);
            },

            expand = function (button) {
                var targetId = button.dataset.toggleTargetId,
                    target = document.getElementById(targetId);

                if (!target) {
                    throw \"Toggle target \" + targetId + \" does not exist\";
                }

                if (isCollapsed(button)) {
                    Sfjs.removeClass(button, 'closed');
                    Sfjs.removeClass(target, 'hidden');

                    states[targetId] = 1;
                    storage.setItem(STORAGE_KEY, states);
                }
            },

            collapse = function (button) {
                var targetId = button.dataset.toggleTargetId,
                    target = document.getElementById(targetId);

                if (!target) {
                    throw \"Toggle target \" + targetId + \" does not exist\";
                }

                if (isExpanded(button)) {
                    Sfjs.addClass(button, 'closed');
                    Sfjs.addClass(target, 'hidden');

                    states[targetId] = 0;
                    storage.setItem(STORAGE_KEY, states);
                }
            },

            toggle = function (button) {
                if (Sfjs.hasClass(button, 'closed')) {
                    expand(button);
                } else {
                    collapse(button);
                }
            },

            initButtons = function (buttons) {
                states = storage.getItem(STORAGE_KEY, {});

                // must be an object, not an array or anything else
                // `typeof` returns \"object\" also for arrays, so the following
                // check must be done
                // see http://stackoverflow.com/questions/4775722/check-if-object-is-array
                if ('[object Object]' !== Object.prototype.toString.call(states)) {
                    states = {};
                }

                for (var i = 0, l = buttons.length; i < l; ++i) {
                    var targetId = buttons[i].dataset.toggleTargetId,
                        target = document.getElementById(targetId);

                    if (!target) {
                        throw \"Toggle target \" + targetId + \" does not exist\";
                    }

                    // correct the initial state of the button
                    if (Sfjs.hasClass(target, 'hidden')) {
                        Sfjs.addClass(buttons[i], 'closed');
                    }

                    // attach listener for expanding/collapsing the target
                    clickHandler(buttons[i], toggle);

                    if (states.hasOwnProperty(targetId)) {
                        // open or collapse based on stored data
                        if (0 === states[targetId]) {
                            collapse(buttons[i]);
                        } else {
                            expand(buttons[i]);
                        }
                    }
                }
            };

        return {
            initButtons: initButtons,

            toggle: toggle,

            isExpanded: isExpanded,

            isCollapsed: isCollapsed,

            expand: expand,

            collapse: collapse
        };
    }

    function JsonStorage(storage) {
        var setItem = function (key, data) {
                storage.setItem(key, JSON.stringify(data));
            },

            getItem = function (key, defaultValue) {
                var data = storage.getItem(key);

                if (null !== data) {
                    try {
                        return JSON.parse(data);
                    } catch(e) {
                    }
                }

                return defaultValue;
            };

        return {
            setItem: setItem,

            getItem: getItem
        };
    }

    function TabView() {
        \"use strict\";

        var activeTab = null,

            activeTarget = null,

            select = function (tab) {
                var targetId = tab.dataset.tabTargetId,
                    target = document.getElementById(targetId);

                if (!target) {
                    throw \"Tab target \" + targetId + \" does not exist\";
                }

                if (activeTab) {
                    Sfjs.removeClass(activeTab, 'active');
                }

                if (activeTarget) {
                    Sfjs.addClass(activeTarget, 'hidden');
                }

                Sfjs.addClass(tab, 'active');
                Sfjs.removeClass(target, 'hidden');

                activeTab = tab;
                activeTarget = target;
            },

            initTabs = function (tabs) {
                for (var i = 0, l = tabs.length; i < l; ++i) {
                    var targetId = tabs[i].dataset.tabTargetId,
                        target = document.getElementById(targetId);

                    if (!target) {
                        throw \"Tab target \" + targetId + \" does not exist\";
                    }

                    clickHandler(tabs[i], select);

                    Sfjs.addClass(target, 'hidden');
                }

                if (tabs.length > 0) {
                    select(tabs[0]);
                }
            };

        return {
            initTabs: initTabs,

            select: select
        };
    }

    var tabTarget = new TabView(),
        toggler = new Toggler(new JsonStorage(sessionStorage)),
        clickHandler = function (element, callback) {
            Sfjs.addEventListener(element, 'click', function (e) {
                if (!e) {
                    e = window.event;
                }

                callback(this);

                if (e.preventDefault) {
                    e.preventDefault();
                } else {
                    e.returnValue = false;
                }

                e.stopPropagation();

                return false;
            });
        };

    tabTarget.initTabs(document.querySelectorAll('.tree .tree-inner'));
    toggler.initButtons(document.querySelectorAll('a.toggle-button'));
    </script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 449
    public function macro_form_tree_entry($name = null, $data = null, $is_root = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "data" => $data,
            "is_root" => $is_root,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_tree_entry"));

            // line 450
            yield "    ";
            $macros["tree"] = $this;
            // line 451
            yield "    ";
            $context["has_error"] = (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", true, true, false, 451) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", false, false, false, 451)) > 0));
            // line 452
            yield "    <li>
        <div class=\"tree-inner\" data-tab-target-id=\"";
            // line 453
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 453), "html", null, true);
            yield "-details\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("name", $context)) ? (Twig\Extension\CoreExtension::default(($context["name"] ?? null), "(no name)")) : ("(no name)")), "html", null, true);
            yield "\">
            ";
            // line 454
            if ((($tmp = ($context["has_error"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 455
                yield "                <div class=\"badge-error\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", false, false, false, 455)), "html", null, true);
                yield "</div>
            ";
            }
            // line 457
            yield "
            ";
            // line 458
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "children", [], "any", false, false, false, 458))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 459
                yield "                <a class=\"toggle-button\" data-toggle-target-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 459), "html", null, true);
                yield "-children\" href=\"#\"><span class=\"toggle-icon\"></span></a>
            ";
            } else {
                // line 461
                yield "                <div class=\"toggle-icon empty\"></div>
            ";
            }
            // line 463
            yield "
            <span ";
            // line 464
            if ((($context["has_error"] ?? null) || ((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "has_children_error", [], "any", true, true, false, 464)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "has_children_error", [], "any", false, false, false, 464), false)) : (false)))) {
                yield "class=\"has-error\"";
            }
            yield ">
                ";
            // line 465
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("name", $context)) ? (Twig\Extension\CoreExtension::default(($context["name"] ?? null), "(no name)")) : ("(no name)")), "html", null, true);
            yield "
            </span>
        </div>

        ";
            // line 469
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "children", [], "any", false, false, false, 469))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 470
                yield "            <ul id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 470), "html", null, true);
                yield "-children\" ";
                if (( !($context["is_root"] ?? null) &&  !((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "has_children_error", [], "any", true, true, false, 470)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "has_children_error", [], "any", false, false, false, 470), false)) : (false)))) {
                    yield "class=\"hidden\"";
                }
                yield ">
                ";
                // line 471
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "children", [], "any", false, false, false, 471));
                foreach ($context['_seq'] as $context["childName"] => $context["childData"]) {
                    // line 472
                    yield "                    ";
                    yield $macros["tree"]->getTemplateForMacro("macro_form_tree_entry", $context, 472, $this->getSourceContext())->macro_form_tree_entry(...[$context["childName"], $context["childData"], false]);
                    yield "
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['childName'], $context['childData'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 474
                yield "            </ul>
        ";
            }
            // line 476
            yield "    </li>
";
            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 479
    public function macro_form_tree_details($name = null, $data = null, $forms_by_hash = null, $show = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "data" => $data,
            "forms_by_hash" => $forms_by_hash,
            "show" => $show,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_tree_details"));

            // line 480
            yield "    ";
            $macros["tree"] = $this;
            // line 481
            yield "    <div class=\"tree-details";
            if ((($tmp =  !((array_key_exists("show", $context)) ? (Twig\Extension\CoreExtension::default(($context["show"] ?? null), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield " hidden";
            }
            yield "\" ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", true, true, false, 481)) {
                yield "id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 481), "html", null, true);
                yield "-details\"";
            }
            yield ">
        <h2>";
            // line 482
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("name", $context)) ? (Twig\Extension\CoreExtension::default(($context["name"] ?? null), "(no name)")) : ("(no name)")), "html", null, true);
            yield "</h2>
        ";
            // line 483
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "type_class", [], "any", true, true, false, 483)) {
                // line 484
                yield "            <h3 class=\"dump-inline form-data-type\">";
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "type_class", [], "any", false, false, false, 484));
                yield "</h3>
        ";
            }
            // line 486
            yield "
        ";
            // line 487
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", true, true, false, 487) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", false, false, false, 487)) > 0))) {
                // line 488
                yield "        <div class=\"errors\">
            <h3>
                <a class=\"toggle-button\" data-toggle-target-id=\"";
                // line 490
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 490), "html", null, true);
                yield "-errors\" href=\"#\">
                    Errors <span class=\"toggle-icon\"></span>
                </a>
            </h3>

            <table id=\"";
                // line 495
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 495), "html", null, true);
                yield "-errors\">
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Origin</th>
                        <th>Cause</th>
                    </tr>
                </thead>
                <tbody>
                ";
                // line 504
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", false, false, false, 504));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 505
                    yield "                <tr>
                    <td>";
                    // line 506
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 506), "html", null, true);
                    yield "</td>
                    <td>
                        ";
                    // line 508
                    if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "origin", [], "any", false, false, false, 508))) {
                        // line 509
                        yield "                            <em>This form.</em>
                        ";
                    } elseif ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source,                     // line 510
($context["forms_by_hash"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["error"], "origin", [], "any", false, false, false, 510), [], "array", true, true, false, 510)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 511
                        yield "                            <em>Unknown.</em>
                        ";
                    } else {
                        // line 513
                        yield "                            ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (($_v1 = ($context["forms_by_hash"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["error"], "origin", [], "any", false, false, false, 513)] ?? null) : null), "name", [], "any", false, false, false, 513), "html", null, true);
                        yield "
                        ";
                    }
                    // line 515
                    yield "                    </td>
                    <td>
                        ";
                    // line 517
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["error"], "trace", [], "any", false, false, false, 517)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 518
                        yield "                            <span class=\"newline\">Caused by:</span>
                            ";
                        // line 519
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "trace", [], "any", false, false, false, 519));
                        foreach ($context['_seq'] as $context["_key"] => $context["stacked"]) {
                            // line 520
                            yield "                                ";
                            yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["stacked"]);
                            yield "
                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['stacked'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 522
                        yield "                        ";
                    } else {
                        // line 523
                        yield "                            <em>Unknown.</em>
                        ";
                    }
                    // line 525
                    yield "                    </td>
                </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 528
                yield "                </tbody>
            </table>
        </div>
        ";
            }
            // line 532
            yield "
        ";
            // line 533
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "default_data", [], "any", true, true, false, 533)) {
                // line 534
                yield "        <h3>
            <a class=\"toggle-button\" data-toggle-target-id=\"";
                // line 535
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 535), "html", null, true);
                yield "-default_data\" href=\"#\">
                Default Data <span class=\"toggle-icon\"></span>
            </a>
        </h3>

        <div id=\"";
                // line 540
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 540), "html", null, true);
                yield "-default_data\">
            <table>
                <thead>
                    <tr>
                        <th width=\"180\">Property</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class=\"font-normal\" scope=\"row\">Model Format</th>
                        <td>
                            ";
                // line 552
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "default_data", [], "any", false, true, false, 552), "model", [], "any", true, true, false, 552)) {
                    // line 553
                    yield "                                ";
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "default_data", [], "any", false, false, false, 553), "seek", ["model"], "method", false, false, false, 553));
                    yield "
                            ";
                } else {
                    // line 555
                    yield "                                <em class=\"font-normal text-muted\">same as normalized format</em>
                            ";
                }
                // line 557
                yield "                        </td>
                    </tr>
                    <tr>
                        <th class=\"font-normal\" scope=\"row\">Normalized Format</th>
                        <td>";
                // line 561
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "default_data", [], "any", false, false, false, 561), "seek", ["norm"], "method", false, false, false, 561));
                yield "</td>
                    </tr>
                    <tr>
                        <th class=\"font-normal\" scope=\"row\">View Format</th>
                        <td>
                            ";
                // line 566
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "default_data", [], "any", false, true, false, 566), "view", [], "any", true, true, false, 566)) {
                    // line 567
                    yield "                                ";
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "default_data", [], "any", false, false, false, 567), "seek", ["view"], "method", false, false, false, 567));
                    yield "
                            ";
                } else {
                    // line 569
                    yield "                                <em class=\"font-normal text-muted\">same as normalized format</em>
                            ";
                }
                // line 571
                yield "                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        ";
            }
            // line 577
            yield "
        ";
            // line 578
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "submitted_data", [], "any", true, true, false, 578)) {
                // line 579
                yield "        <h3>
            <a class=\"toggle-button\" data-toggle-target-id=\"";
                // line 580
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 580), "html", null, true);
                yield "-submitted_data\" href=\"#\">
                Submitted Data <span class=\"toggle-icon\"></span>
            </a>
        </h3>

        <div id=\"";
                // line 585
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 585), "html", null, true);
                yield "-submitted_data\">
        ";
                // line 586
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "submitted_data", [], "any", false, true, false, 586), "norm", [], "any", true, true, false, 586)) {
                    // line 587
                    yield "            <table>
                <thead>
                    <tr>
                        <th width=\"180\">Property</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class=\"font-normal\" scope=\"row\">View Format</th>
                        <td>
                            ";
                    // line 598
                    if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "submitted_data", [], "any", false, true, false, 598), "view", [], "any", true, true, false, 598)) {
                        // line 599
                        yield "                                ";
                        yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "submitted_data", [], "any", false, false, false, 599), "seek", ["view"], "method", false, false, false, 599));
                        yield "
                            ";
                    } else {
                        // line 601
                        yield "                                <em class=\"font-normal text-muted\">same as normalized format</em>
                            ";
                    }
                    // line 603
                    yield "                        </td>
                    </tr>
                    <tr>
                        <th class=\"font-normal\" scope=\"row\">Normalized Format</th>
                        <td>";
                    // line 607
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "submitted_data", [], "any", false, false, false, 607), "seek", ["norm"], "method", false, false, false, 607));
                    yield "</td>
                    </tr>
                    <tr>
                        <th class=\"font-normal\" scope=\"row\">Model Format</th>
                        <td>
                            ";
                    // line 612
                    if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "submitted_data", [], "any", false, true, false, 612), "model", [], "any", true, true, false, 612)) {
                        // line 613
                        yield "                                ";
                        yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "submitted_data", [], "any", false, false, false, 613), "seek", ["model"], "method", false, false, false, 613));
                        yield "
                            ";
                    } else {
                        // line 615
                        yield "                                <em class=\"font-normal text-muted\">same as normalized format</em>
                            ";
                    }
                    // line 617
                    yield "                        </td>
                    </tr>
                </tbody>
            </table>
        ";
                } else {
                    // line 622
                    yield "            <div class=\"empty\">
                <p>This form was not submitted.</p>
            </div>
        ";
                }
                // line 626
                yield "        </div>
        ";
            }
            // line 628
            yield "
        ";
            // line 629
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "passed_options", [], "any", true, true, false, 629)) {
                // line 630
                yield "        <h3>
            <a class=\"toggle-button\" data-toggle-target-id=\"";
                // line 631
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 631), "html", null, true);
                yield "-passed_options\" href=\"#\">
                Passed Options <span class=\"toggle-icon\"></span>
            </a>
        </h3>

        <div id=\"";
                // line 636
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 636), "html", null, true);
                yield "-passed_options\">
            ";
                // line 637
                if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "passed_options", [], "any", false, false, false, 637))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 638
                    yield "            <table>
                <thead>
                    <tr>
                        <th width=\"180\">Option</th>
                        <th>Passed Value</th>
                        <th>Resolved Value</th>
                    </tr>
                </thead>
                <tbody>
                ";
                    // line 647
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "passed_options", [], "any", false, false, false, 647));
                    foreach ($context['_seq'] as $context["option"] => $context["value"]) {
                        // line 648
                        yield "                <tr>
                    <th>";
                        // line 649
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
                        yield "</th>
                    <td>";
                        // line 650
                        yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["value"]);
                        yield "</td>
                    <td>
                        ";
                        // line 653
                        yield "                        ";
                        $context["option_value"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["value"], "value", [], "any", true, true, false, 653)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 653), $context["value"])) : ($context["value"]));
                        // line 654
                        yield "                        ";
                        $context["resolved_option_value"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "resolved_options", [], "any", false, true, false, 654), $context["option"], [], "array", false, true, false, 654), "value", [], "any", true, true, false, 654)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "resolved_options", [], "any", false, false, false, 654)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2[$context["option"]] ?? null) : null), "value", [], "any", false, false, false, 654), (($_v3 = CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "resolved_options", [], "any", false, false, false, 654)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3[$context["option"]] ?? null) : null))) : ((($_v4 = CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "resolved_options", [], "any", false, false, false, 654)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4[$context["option"]] ?? null) : null)));
                        // line 655
                        yield "                        ";
                        if ((($context["resolved_option_value"] ?? null) == ($context["option_value"] ?? null))) {
                            // line 656
                            yield "                            <em class=\"font-normal text-muted\">same as passed value</em>
                        ";
                        } else {
                            // line 658
                            yield "                            ";
                            yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "resolved_options", [], "any", false, false, false, 658), "seek", [$context["option"]], "method", false, false, false, 658));
                            yield "
                        ";
                        }
                        // line 660
                        yield "                    </td>
                </tr>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['option'], $context['value'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 663
                    yield "                </tbody>
            </table>
            ";
                } else {
                    // line 666
                    yield "                <div class=\"empty\">
                    <p>No options were passed when constructing this form.</p>
                </div>
            ";
                }
                // line 670
                yield "        </div>
        ";
            }
            // line 672
            yield "
        ";
            // line 673
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "resolved_options", [], "any", true, true, false, 673)) {
                // line 674
                yield "        <h3>
            <a class=\"toggle-button\" data-toggle-target-id=\"";
                // line 675
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 675), "html", null, true);
                yield "-resolved_options\" href=\"#\">
                Resolved Options <span class=\"toggle-icon\"></span>
            </a>
        </h3>

        <div id=\"";
                // line 680
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 680), "html", null, true);
                yield "-resolved_options\" class=\"hidden\">
            <table>
                <thead>
                    <tr>
                        <th width=\"180\">Option</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                ";
                // line 689
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "resolved_options", [], "any", false, false, false, 689));
                foreach ($context['_seq'] as $context["option"] => $context["value"]) {
                    // line 690
                    yield "                <tr>
                    <th scope=\"row\">";
                    // line 691
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
                    yield "</th>
                    <td>";
                    // line 692
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["value"]);
                    yield "</td>
                </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['option'], $context['value'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 695
                yield "                </tbody>
            </table>
        </div>
        ";
            }
            // line 699
            yield "
        ";
            // line 700
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "view_vars", [], "any", true, true, false, 700)) {
                // line 701
                yield "        <h3>
            <a class=\"toggle-button\" data-toggle-target-id=\"";
                // line 702
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 702), "html", null, true);
                yield "-view_vars\" href=\"#\">
                View Variables <span class=\"toggle-icon\"></span>
            </a>
        </h3>

        <div id=\"";
                // line 707
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 707), "html", null, true);
                yield "-view_vars\" class=\"hidden\">
            <table>
                <thead>
                    <tr>
                        <th width=\"180\">Variable</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                ";
                // line 716
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "view_vars", [], "any", false, false, false, 716));
                foreach ($context['_seq'] as $context["variable"] => $context["value"]) {
                    // line 717
                    yield "                <tr>
                    <th scope=\"row\">";
                    // line 718
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["variable"], "html", null, true);
                    yield "</th>
                    <td>";
                    // line 719
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["value"]);
                    yield "</td>
                </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['variable'], $context['value'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 722
                yield "                </tbody>
            </table>
        </div>
        ";
            }
            // line 726
            yield "    </div>

    ";
            // line 728
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "children", [], "any", false, false, false, 728));
            foreach ($context['_seq'] as $context["childName"] => $context["childData"]) {
                // line 729
                yield "        ";
                yield $macros["tree"]->getTemplateForMacro("macro_form_tree_details", $context, 729, $this->getSourceContext())->macro_form_tree_details(...[$context["childName"], $context["childData"], ($context["forms_by_hash"] ?? null)]);
                yield "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['childName'], $context['childData'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@WebProfiler/Collector/form.html.twig";
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
        return array (  1297 => 729,  1293 => 728,  1289 => 726,  1283 => 722,  1274 => 719,  1270 => 718,  1267 => 717,  1263 => 716,  1251 => 707,  1243 => 702,  1240 => 701,  1238 => 700,  1235 => 699,  1229 => 695,  1220 => 692,  1216 => 691,  1213 => 690,  1209 => 689,  1197 => 680,  1189 => 675,  1186 => 674,  1184 => 673,  1181 => 672,  1177 => 670,  1171 => 666,  1166 => 663,  1158 => 660,  1152 => 658,  1148 => 656,  1145 => 655,  1142 => 654,  1139 => 653,  1134 => 650,  1130 => 649,  1127 => 648,  1123 => 647,  1112 => 638,  1110 => 637,  1106 => 636,  1098 => 631,  1095 => 630,  1093 => 629,  1090 => 628,  1086 => 626,  1080 => 622,  1073 => 617,  1069 => 615,  1063 => 613,  1061 => 612,  1053 => 607,  1047 => 603,  1043 => 601,  1037 => 599,  1035 => 598,  1022 => 587,  1020 => 586,  1016 => 585,  1008 => 580,  1005 => 579,  1003 => 578,  1000 => 577,  992 => 571,  988 => 569,  982 => 567,  980 => 566,  972 => 561,  966 => 557,  962 => 555,  956 => 553,  954 => 552,  939 => 540,  931 => 535,  928 => 534,  926 => 533,  923 => 532,  917 => 528,  909 => 525,  905 => 523,  902 => 522,  893 => 520,  889 => 519,  886 => 518,  884 => 517,  880 => 515,  874 => 513,  870 => 511,  868 => 510,  865 => 509,  863 => 508,  858 => 506,  855 => 505,  851 => 504,  839 => 495,  831 => 490,  827 => 488,  825 => 487,  822 => 486,  816 => 484,  814 => 483,  810 => 482,  797 => 481,  794 => 480,  776 => 479,  766 => 476,  762 => 474,  753 => 472,  749 => 471,  740 => 470,  738 => 469,  731 => 465,  725 => 464,  722 => 463,  718 => 461,  712 => 459,  710 => 458,  707 => 457,  701 => 455,  699 => 454,  693 => 453,  690 => 452,  687 => 451,  684 => 450,  667 => 449,  441 => 229,  435 => 225,  431 => 223,  414 => 221,  397 => 220,  391 => 216,  382 => 214,  378 => 213,  374 => 211,  372 => 210,  368 => 208,  358 => 207,  186 => 43,  176 => 42,  167 => 39,  161 => 36,  158 => 35,  156 => 34,  151 => 32,  144 => 31,  134 => 30,  123 => 26,  120 => 25,  111 => 22,  104 => 18,  100 => 16,  98 => 15,  95 => 14,  88 => 11,  82 => 9,  79 => 8,  76 => 7,  73 => 6,  63 => 5,  55 => 1,  53 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/form.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/form.html.twig");
    }
}
