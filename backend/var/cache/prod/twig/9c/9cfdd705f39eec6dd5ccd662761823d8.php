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

/* foundation_5_layout.html.twig */
class __TwigTemplate_b1f10aa0ea0f9036b4f695bf80f2035c extends Template
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
            'form_widget_simple' => [$this, 'block_form_widget_simple'],
            'textarea_widget' => [$this, 'block_textarea_widget'],
            'button_widget' => [$this, 'block_button_widget'],
            'money_widget' => [$this, 'block_money_widget'],
            'percent_widget' => [$this, 'block_percent_widget'],
            'datetime_widget' => [$this, 'block_datetime_widget'],
            'date_widget' => [$this, 'block_date_widget'],
            'time_widget' => [$this, 'block_time_widget'],
            'choice_widget_collapsed' => [$this, 'block_choice_widget_collapsed'],
            'choice_widget_expanded' => [$this, 'block_choice_widget_expanded'],
            'checkbox_widget' => [$this, 'block_checkbox_widget'],
            'radio_widget' => [$this, 'block_radio_widget'],
            'form_label' => [$this, 'block_form_label'],
            'choice_label' => [$this, 'block_choice_label'],
            'checkbox_label' => [$this, 'block_checkbox_label'],
            'radio_label' => [$this, 'block_radio_label'],
            'checkbox_radio_label' => [$this, 'block_checkbox_radio_label'],
            'form_row' => [$this, 'block_form_row'],
            'choice_row' => [$this, 'block_choice_row'],
            'date_row' => [$this, 'block_date_row'],
            'time_row' => [$this, 'block_time_row'],
            'datetime_row' => [$this, 'block_datetime_row'],
            'checkbox_row' => [$this, 'block_checkbox_row'],
            'radio_row' => [$this, 'block_radio_row'],
            'form_errors' => [$this, 'block_form_errors'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("form_div_layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_widget_simple(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 8
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 8)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 8), "")) : ("")) . " error"))]);
            // line 9
            yield "    ";
        }
        // line 10
        yield from $this->yieldParentBlock("form_widget_simple", $context, $blocks);
        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_textarea_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 14
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 15
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 15)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 15), "")) : ("")) . " error"))]);
            // line 16
            yield "    ";
        }
        // line 17
        yield from $this->yieldParentBlock("textarea_widget", $context, $blocks);
        yield from [];
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_button_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 21
        $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 21), "")) : ("")) . " button"))]);
        // line 22
        yield from $this->yieldParentBlock("button_widget", $context, $blocks);
        yield from [];
    }

    // line 25
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_money_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 26
        yield "<div class=\"row collapse\">
        ";
        // line 27
        $context["prepend"] = ("{{" == Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["money_pattern"] ?? null), 0, 2));
        // line 28
        yield "        ";
        if ((($tmp =  !($context["prepend"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "            <div class=\"small-3 large-2 columns\">
                <span class=\"prefix\">";
            // line 30
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->encodeCurrency($this->env, ($context["money_pattern"] ?? null));
            yield "</span>
            </div>
        ";
        }
        // line 33
        yield "        <div class=\"small-9 large-10 columns\">";
        // line 34
        yield from         $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
        // line 35
        yield "</div>
        ";
        // line 36
        if ((($tmp = ($context["prepend"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 37
            yield "            <div class=\"small-3 large-2 columns\">
                <span class=\"postfix\">";
            // line 38
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->encodeCurrency($this->env, ($context["money_pattern"] ?? null));
            yield "</span>
            </div>
        ";
        }
        // line 41
        yield "    </div>";
        yield from [];
    }

    // line 44
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_percent_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 45
        yield "<div class=\"row collapse\">";
        // line 46
        if ((($tmp = ($context["symbol"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 47
            yield "<div class=\"small-9 large-10 columns\">";
            // line 48
            yield from             $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
            // line 49
            yield "</div>
            <div class=\"small-3 large-2 columns\">
                <span class=\"postfix\">";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("symbol", $context)) ? (Twig\Extension\CoreExtension::default(($context["symbol"] ?? null), "%")) : ("%")), "html", null, true);
            yield "</span>
            </div>";
        } else {
            // line 54
            yield "<div class=\"small-12 large-12 columns\">";
            // line 55
            yield from             $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
            // line 56
            yield "</div>";
        }
        // line 58
        yield "</div>";
        yield from [];
    }

    // line 61
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_datetime_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 62
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 63
            yield from             $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 65
            yield "        ";
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 65)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 65), "")) : ("")) . " row"))]);
            // line 66
            yield "        <div class=\"row\">
            <div class=\"large-7 columns\">";
            // line 67
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 67), 'errors');
            yield "</div>
            <div class=\"large-5 columns\">";
            // line 68
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, false, 68), 'errors');
            yield "</div>
        </div>
        <div ";
            // line 70
            yield from             $this->unwrap()->yieldBlock("widget_container_attributes", $context, $blocks);
            yield ">
            <div class=\"large-7 columns\">";
            // line 71
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 71), 'widget', ["datetime" => true]);
            yield "</div>
            <div class=\"large-5 columns\">";
            // line 72
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, false, 72), 'widget', ["datetime" => true]);
            yield "</div>
        </div>
    ";
        }
        yield from [];
    }

    // line 77
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_date_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 78
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 79
            yield from             $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 81
            yield "        ";
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 81)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 81), "")) : ("")) . " row"))]);
            // line 82
            yield "        ";
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 83
                yield "            <div ";
                yield from                 $this->unwrap()->yieldBlock("widget_container_attributes", $context, $blocks);
                yield ">
        ";
            }
            // line 85
            yield Twig\Extension\CoreExtension::replace(($context["date_pattern"] ?? null), ["{{ year }}" => (("<div class=\"large-4 columns\">" .             // line 86
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "year", [], "any", false, false, false, 86), 'widget')) . "</div>"), "{{ month }}" => (("<div class=\"large-4 columns\">" .             // line 87
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "month", [], "any", false, false, false, 87), 'widget')) . "</div>"), "{{ day }}" => (("<div class=\"large-4 columns\">" .             // line 88
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "day", [], "any", false, false, false, 88), 'widget')) . "</div>")]);
            // line 90
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 91
                yield "            </div>
        ";
            }
            // line 93
            yield "    ";
        }
        yield from [];
    }

    // line 96
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_time_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 97
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 98
            yield from             $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 100
            yield "        ";
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 100)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 100), "")) : ("")) . " row"))]);
            // line 101
            yield "        ";
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 102
                yield "            <div ";
                yield from                 $this->unwrap()->yieldBlock("widget_container_attributes", $context, $blocks);
                yield ">
        ";
            }
            // line 104
            yield "        ";
            if ((($tmp = ($context["with_seconds"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 105
                yield "            <div class=\"large-4 columns\">";
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "hour", [], "any", false, false, false, 105), 'widget');
                yield "</div>
            <div class=\"large-4 columns\">
                <div class=\"row collapse\">
                    <div class=\"small-3 large-2 columns\">
                        <span class=\"prefix\">:</span>
                    </div>
                    <div class=\"small-9 large-10 columns\">
                        ";
                // line 112
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "minute", [], "any", false, false, false, 112), 'widget');
                yield "
                    </div>
                </div>
            </div>
            <div class=\"large-4 columns\">
                <div class=\"row collapse\">
                    <div class=\"small-3 large-2 columns\">
                        <span class=\"prefix\">:</span>
                    </div>
                    <div class=\"small-9 large-10 columns\">
                        ";
                // line 122
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "second", [], "any", false, false, false, 122), 'widget');
                yield "
                    </div>
                </div>
            </div>
        ";
            } else {
                // line 127
                yield "            <div class=\"large-6 columns\">";
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "hour", [], "any", false, false, false, 127), 'widget');
                yield "</div>
            <div class=\"large-6 columns\">
                <div class=\"row collapse\">
                    <div class=\"small-3 large-2 columns\">
                        <span class=\"prefix\">:</span>
                    </div>
                    <div class=\"small-9 large-10 columns\">
                        ";
                // line 134
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "minute", [], "any", false, false, false, 134), 'widget');
                yield "
                    </div>
                </div>
            </div>
        ";
            }
            // line 139
            yield "        ";
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 140
                yield "            </div>
        ";
            }
            // line 142
            yield "    ";
        }
        yield from [];
    }

    // line 145
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_choice_widget_collapsed(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 146
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 147
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 147)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 147), "")) : ("")) . " error"))]);
            // line 148
            yield "    ";
        }
        // line 149
        yield "
    ";
        // line 150
        if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 151
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["style" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "style", [], "any", true, true, false, 151)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "style", [], "any", false, false, false, 151), "")) : ("")) . " height: auto; background-image: none;"))]);
            // line 152
            yield "    ";
        }
        // line 153
        yield "
    ";
        // line 154
        if ((((($context["required"] ?? null) && (null === ($context["placeholder"] ?? null))) &&  !($context["placeholder_in_choices"] ?? null)) &&  !($context["multiple"] ?? null))) {
            // line 155
            $context["required"] = false;
        }
        // line 157
        yield "<select ";
        yield from         $this->unwrap()->yieldBlock("widget_attributes", $context, $blocks);
        if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " multiple=\"multiple\" data-customforms=\"disabled\"";
        }
        yield ">
        ";
        // line 158
        if ((($tmp =  !(null === ($context["placeholder"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 159
            yield "<option value=\"\"";
            if ((($context["required"] ?? null) && Twig\Extension\CoreExtension::testEmpty(($context["value"] ?? null)))) {
                yield " selected=\"selected\"";
            }
            yield ">";
            yield (((($context["translation_domain"] ?? null) === false)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["placeholder"] ?? null), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["placeholder"] ?? null), [], ($context["translation_domain"] ?? null)), "html", null, true)));
            yield "</option>";
        }
        // line 161
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["preferred_choices"] ?? null)) > 0)) {
            // line 162
            $context["options"] = ($context["preferred_choices"] ?? null);
            // line 163
            yield "            ";
            $context["render_preferred_choices"] = true;
            // line 164
            yield from             $this->unwrap()->yieldBlock("choice_widget_options", $context, $blocks);
            // line 165
            if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["choices"] ?? null)) > 0) &&  !(null === ($context["separator"] ?? null)))) {
                // line 166
                yield "<option disabled=\"disabled\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["separator"] ?? null), "html", null, true);
                yield "</option>";
            }
        }
        // line 169
        $context["options"] = ($context["choices"] ?? null);
        // line 170
        $context["render_preferred_choices"] = false;
        // line 171
        yield from         $this->unwrap()->yieldBlock("choice_widget_options", $context, $blocks);
        // line 172
        yield "</select>";
        yield from [];
    }

    // line 175
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_choice_widget_expanded(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 176
        if (CoreExtension::inFilter("-inline", ((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 176)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 176), "")) : ("")))) {
            // line 177
            yield "        <ul class=\"inline-list\">
            ";
            // line 178
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 179
                yield "                <li>";
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["parent_label_class" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 180
($context["label_attr"] ?? null), "class", [], "any", true, true, false, 180)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 180), "")) : (""))]);
                // line 181
                yield "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 183
            yield "        </ul>
    ";
        } else {
            // line 185
            yield "        <div ";
            yield from             $this->unwrap()->yieldBlock("widget_container_attributes", $context, $blocks);
            yield ">
            ";
            // line 186
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 187
                yield "                ";
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["parent_label_class" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 188
($context["label_attr"] ?? null), "class", [], "any", true, true, false, 188)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 188), "")) : (""))]);
                // line 189
                yield "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 191
            yield "        </div>
    ";
        }
        yield from [];
    }

    // line 195
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_checkbox_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 196
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (Twig\Extension\CoreExtension::default(($context["parent_label_class"] ?? null), "")) : (""));
        // line 197
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 198
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 198)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 198), "")) : ("")) . " error"))]);
            // line 199
            yield "    ";
        }
        // line 200
        yield "    ";
        if (CoreExtension::inFilter("checkbox-inline", ($context["parent_label_class"] ?? null))) {
            // line 201
            yield "        ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)]);
            yield "
    ";
        } else {
            // line 203
            yield "        <div class=\"checkbox\">
            ";
            // line 204
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)]);
            yield "
        </div>
    ";
        }
        yield from [];
    }

    // line 209
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_radio_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 210
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (Twig\Extension\CoreExtension::default(($context["parent_label_class"] ?? null), "")) : (""));
        // line 211
        yield "    ";
        if (CoreExtension::inFilter("radio-inline", ($context["parent_label_class"] ?? null))) {
            // line 212
            yield "        ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("radio_widget", $context, $blocks)]);
            yield "
    ";
        } else {
            // line 214
            yield "        ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
                // line 215
                $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 215)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 215), "")) : ("")) . " error"))]);
                // line 216
                yield "        ";
            }
            // line 217
            yield "        <div class=\"radio\">
            ";
            // line 218
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("radio_widget", $context, $blocks)]);
            yield "
        </div>
    ";
        }
        yield from [];
    }

    // line 225
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 226
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 227
            $context["label_attr"] = Twig\Extension\CoreExtension::merge(($context["label_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 227)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 227), "")) : ("")) . " error"))]);
            // line 228
            yield "    ";
        }
        // line 229
        yield from $this->yieldParentBlock("form_label", $context, $blocks);
        yield from [];
    }

    // line 232
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_choice_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 233
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 234
            $context["label_attr"] = Twig\Extension\CoreExtension::merge(($context["label_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 234)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 234), "")) : ("")) . " error"))]);
            // line 235
            yield "    ";
        }
        // line 236
        yield "    ";
        // line 237
        yield "    ";
        $context["label_attr"] = Twig\Extension\CoreExtension::merge(($context["label_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace(((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 237)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 237), "")) : ("")), ["checkbox-inline" => "", "radio-inline" => ""]))]);
        // line 238
        yield from         $this->unwrap()->yieldBlock("form_label", $context, $blocks);
        yield from [];
    }

    // line 241
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_checkbox_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 242
        yield from         $this->unwrap()->yieldBlock("checkbox_radio_label", $context, $blocks);
        yield from [];
    }

    // line 245
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_radio_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 246
        yield from         $this->unwrap()->yieldBlock("checkbox_radio_label", $context, $blocks);
        yield from [];
    }

    // line 249
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_checkbox_radio_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 250
        if ((($tmp = ($context["required"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 251
            yield "        ";
            $context["label_attr"] = Twig\Extension\CoreExtension::merge(($context["label_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 251)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 251), "")) : ("")) . " required"))]);
            // line 252
            yield "    ";
        }
        // line 253
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 254
            $context["label_attr"] = Twig\Extension\CoreExtension::merge(($context["label_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 254)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 254), "")) : ("")) . " error"))]);
            // line 255
            yield "    ";
        }
        // line 256
        yield "    ";
        if (Twig\Extension\CoreExtension::testEmpty(($context["label"] ?? null))) {
            // line 257
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["label_format"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 258
                $context["label"] = Twig\Extension\CoreExtension::replace(($context["label_format"] ?? null), ["%name%" =>                 // line 259
($context["name"] ?? null), "%id%" =>                 // line 260
($context["id"] ?? null)]);
            } else {
                // line 263
                $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(($context["name"] ?? null));
            }
        }
        // line 266
        yield "    <label";
        $_v0 = $context;
        $_v1 = ["attr" => ($context["label_attr"] ?? null)];
        if (!is_iterable($_v1)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a mapping.', 266, $this->getSourceContext());
        }
        $_v1 = CoreExtension::toArray($_v1);
        $context = $_v1 + $context + $this->env->getGlobals();
        yield from         $this->unwrap()->yieldBlock("attributes", $context, $blocks);
        $context = $_v0;
        yield ">
        ";
        // line 267
        yield ($context["widget"] ?? null);
        yield "
        ";
        // line 268
        yield (((($context["translation_domain"] ?? null) === false)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["label"] ?? null), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["label"] ?? null), ($context["label_translation_parameters"] ?? null), ($context["translation_domain"] ?? null)), "html", null, true)));
        yield "
    </label>";
        yield from [];
    }

    // line 274
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 275
        $context["widget_attr"] = [];
        // line 276
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["help"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 277
            $context["widget_attr"] = ["attr" => ["aria-describedby" => (($context["id"] ?? null) . "_help")]];
        }
        // line 279
        yield "<div";
        $_v2 = $context;
        $_v3 = ["attr" => Twig\Extension\CoreExtension::merge(($context["row_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 279)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 279), "")) : ("")) . " row"))])];
        if (!is_iterable($_v3)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a mapping.', 279, $this->getSourceContext());
        }
        $_v3 = CoreExtension::toArray($_v3);
        $context = $_v3 + $context + $this->env->getGlobals();
        yield from         $this->unwrap()->yieldBlock("attributes", $context, $blocks);
        $context = $_v2;
        yield ">
        <div class=\"large-12 columns";
        // line 280
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (Twig\Extension\CoreExtension::default(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            yield " error";
        }
        yield "\">";
        // line 281
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        // line 282
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ($context["widget_attr"] ?? null));
        // line 283
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'help');
        // line 284
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 285
        yield "</div>
    </div>";
        yield from [];
    }

    // line 289
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_choice_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 290
        $context["force_error"] = true;
        // line 291
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield from [];
    }

    // line 294
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_date_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 295
        $context["force_error"] = true;
        // line 296
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield from [];
    }

    // line 299
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_time_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 300
        $context["force_error"] = true;
        // line 301
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield from [];
    }

    // line 304
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_datetime_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 305
        $context["force_error"] = true;
        // line 306
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield from [];
    }

    // line 309
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_checkbox_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 310
        yield "<div";
        $_v4 = $context;
        $_v5 = ["attr" => Twig\Extension\CoreExtension::merge(($context["row_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 310)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 310), "")) : ("")) . " row"))])];
        if (!is_iterable($_v5)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a mapping.', 310, $this->getSourceContext());
        }
        $_v5 = CoreExtension::toArray($_v5);
        $context = $_v5 + $context + $this->env->getGlobals();
        yield from         $this->unwrap()->yieldBlock("attributes", $context, $blocks);
        $context = $_v4;
        yield ">
        <div class=\"large-12 columns";
        // line 311
        if ((($tmp =  !($context["valid"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " error";
        }
        yield "\">
            ";
        // line 312
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 313
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'help');
        // line 314
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        yield "
        </div>
    </div>";
        yield from [];
    }

    // line 319
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_radio_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 320
        yield "<div";
        $_v6 = $context;
        $_v7 = ["attr" => Twig\Extension\CoreExtension::merge(($context["row_attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 320)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 320), "")) : ("")) . " row"))])];
        if (!is_iterable($_v7)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a mapping.', 320, $this->getSourceContext());
        }
        $_v7 = CoreExtension::toArray($_v7);
        $context = $_v7 + $context + $this->env->getGlobals();
        yield from         $this->unwrap()->yieldBlock("attributes", $context, $blocks);
        $context = $_v6;
        yield ">
        <div class=\"large-12 columns";
        // line 321
        if ((($tmp =  !($context["valid"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " error";
        }
        yield "\">
            ";
        // line 322
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 323
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'help');
        // line 324
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        yield "
        </div>
    </div>";
        yield from [];
    }

    // line 331
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_errors(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 332
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 333
            if ((($tmp =  !Symfony\Bridge\Twig\Extension\twig_is_root_form(($context["form"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<small class=\"error\">";
            } else {
                yield "<div data-alert class=\"alert-box alert\">";
            }
            // line 334
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["errors"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 335
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 335), "html", null, true);
                yield "
            ";
                // line 336
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 336)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield ", ";
                }
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
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 338
            if ((($tmp =  !Symfony\Bridge\Twig\Extension\twig_is_root_form(($context["form"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "</small>";
            } else {
                yield "</div>";
            }
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "foundation_5_layout.html.twig";
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
        return array (  961 => 338,  945 => 336,  941 => 335,  924 => 334,  918 => 333,  916 => 332,  909 => 331,  901 => 324,  899 => 323,  897 => 322,  891 => 321,  878 => 320,  871 => 319,  863 => 314,  861 => 313,  859 => 312,  853 => 311,  840 => 310,  833 => 309,  827 => 306,  825 => 305,  818 => 304,  812 => 301,  810 => 300,  803 => 299,  797 => 296,  795 => 295,  788 => 294,  782 => 291,  780 => 290,  773 => 289,  767 => 285,  765 => 284,  763 => 283,  761 => 282,  759 => 281,  754 => 280,  741 => 279,  738 => 277,  736 => 276,  734 => 275,  727 => 274,  720 => 268,  716 => 267,  703 => 266,  699 => 263,  696 => 260,  695 => 259,  694 => 258,  692 => 257,  689 => 256,  686 => 255,  684 => 254,  681 => 253,  678 => 252,  675 => 251,  673 => 250,  666 => 249,  661 => 246,  654 => 245,  649 => 242,  642 => 241,  637 => 238,  634 => 237,  632 => 236,  629 => 235,  627 => 234,  625 => 233,  618 => 232,  613 => 229,  610 => 228,  608 => 227,  606 => 226,  599 => 225,  590 => 218,  587 => 217,  584 => 216,  582 => 215,  579 => 214,  573 => 212,  570 => 211,  568 => 210,  561 => 209,  552 => 204,  549 => 203,  543 => 201,  540 => 200,  537 => 199,  535 => 198,  532 => 197,  530 => 196,  523 => 195,  516 => 191,  509 => 189,  507 => 188,  505 => 187,  501 => 186,  496 => 185,  492 => 183,  485 => 181,  483 => 180,  481 => 179,  477 => 178,  474 => 177,  472 => 176,  465 => 175,  460 => 172,  458 => 171,  456 => 170,  454 => 169,  448 => 166,  446 => 165,  444 => 164,  441 => 163,  439 => 162,  437 => 161,  428 => 159,  426 => 158,  418 => 157,  415 => 155,  413 => 154,  410 => 153,  407 => 152,  405 => 151,  403 => 150,  400 => 149,  397 => 148,  395 => 147,  393 => 146,  386 => 145,  380 => 142,  376 => 140,  373 => 139,  365 => 134,  354 => 127,  346 => 122,  333 => 112,  322 => 105,  319 => 104,  313 => 102,  310 => 101,  307 => 100,  304 => 98,  302 => 97,  295 => 96,  289 => 93,  285 => 91,  283 => 90,  281 => 88,  280 => 87,  279 => 86,  278 => 85,  272 => 83,  269 => 82,  266 => 81,  263 => 79,  261 => 78,  254 => 77,  245 => 72,  241 => 71,  237 => 70,  232 => 68,  228 => 67,  225 => 66,  222 => 65,  219 => 63,  217 => 62,  210 => 61,  205 => 58,  202 => 56,  200 => 55,  198 => 54,  193 => 51,  189 => 49,  187 => 48,  185 => 47,  183 => 46,  181 => 45,  174 => 44,  169 => 41,  163 => 38,  160 => 37,  158 => 36,  155 => 35,  153 => 34,  151 => 33,  145 => 30,  142 => 29,  139 => 28,  137 => 27,  134 => 26,  127 => 25,  122 => 22,  120 => 21,  113 => 20,  108 => 17,  105 => 16,  103 => 15,  101 => 14,  94 => 13,  89 => 10,  86 => 9,  84 => 8,  82 => 7,  75 => 6,  64 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "foundation_5_layout.html.twig", "/var/www/html/vendor/symfony/twig-bridge/Resources/views/Form/foundation_5_layout.html.twig");
    }
}
