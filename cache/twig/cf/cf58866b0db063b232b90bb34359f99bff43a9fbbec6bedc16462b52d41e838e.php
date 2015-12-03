<?php

/* places/places_edit.twig */
class __TwigTemplate_88b6c0675728a1689cba1565b27a3372d43ec7a49a6a124123a8f5e9523f5e74 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "places/places_edit.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->baseUrl(), "html", null, true);
        echo "/images/generic-place-small.png\">
    
    <h2>Edit ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo "</h2>
    <h4>Please 'Update' the details for ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo "</h4>

    <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-edit", array("id" => $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "place_id", array()))), "html", null, true);
        echo "\" method=\"post\">

        <div class=\"form-group ";
        // line 12
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "name", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"name\">Name:</label>
            <input type=\"text\" class=\"form-control\" name=\"name\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo "\" /> 
            ";
        // line 15
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "user_name", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "user_name", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 16
        echo "        </div>

        <div class=\"form-group ";
        // line 18
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "address", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"address\">Address:</label>
            <input type=\"text\" class=\"form-control\" name=\"address\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "address", array()), "html", null, true);
        echo "\"  />
            ";
        // line 21
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "address", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "address", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 22
        echo "        </div>

        <div class=\"form-group ";
        // line 24
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "suburb", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"suburb\">Suburb:</label>
            <input type=\"text\" class=\"form-control\" name=\"suburb\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "suburb", array()), "html", null, true);
        echo "\"  />
            ";
        // line 27
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "suburb", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "suburb", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 28
        echo "        </div>

        <div class=\"form-group ";
        // line 30
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "postcode", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"postcode\">Postcode:</label>
            <input type=\"text\" class=\"form-control\" name=\"postcode\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "postcode", array()), "html", null, true);
        echo "\"  />
            ";
        // line 33
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "postcode", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "postcode", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 34
        echo "        </div>

          
        <div class=\"form-group\">
            <label for=\"tag_id\">Select Category:</label>
            <select class=\"form-control\" name=\"tag_id\">
                ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tags"]) ? $context["tags"] : null));
        foreach ($context['_seq'] as $context["idx"] => $context["tag"]) {
            // line 41
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $context["idx"], "html", null, true);
            echo "\" ";
            if (($context["tag"] == $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "short", array()))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["tag"], "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['idx'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "            </select>
        </div>

        <hr>

        <input type=\"hidden\" name=\"csrf_name\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "name", array()), "html", null, true);
        echo "\">
        <input type=\"hidden\" name=\"csrf_value\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "value", array()), "html", null, true);
        echo "\">
        <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
        <a class=\"btn btn-default\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-all"), "html", null, true);
        echo "\">Cancel</a>

    </form>

";
    }

    public function getTemplateName()
    {
        return "places/places_edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 51,  171 => 49,  167 => 48,  160 => 43,  145 => 41,  141 => 40,  133 => 34,  127 => 33,  123 => 32,  116 => 30,  112 => 28,  106 => 27,  102 => 26,  95 => 24,  91 => 22,  85 => 21,  81 => 20,  74 => 18,  70 => 16,  64 => 15,  60 => 14,  53 => 12,  48 => 10,  43 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <img src="{{ base_url()}}/images/generic-place-small.png">*/
/*     */
/*     <h2>Edit {{ place.name }}</h2>*/
/*     <h4>Please 'Update' the details for {{ place.name }}</h4>*/
/* */
/*     <form action="{{ path_for('places-edit', {id: place.place_id}) }}" method="post">*/
/* */
/*         <div class="form-group {% if errors.name %}has-error{% endif %}">*/
/*             <label class="control-label" for="name">Name:</label>*/
/*             <input type="text" class="form-control" name="name" value="{{ place.name }}" /> */
/*             {% if errors.user_name %}<span class="help-block">{{ errors.user_name.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group {% if errors.address %}has-error{% endif %}">*/
/*             <label class="control-label" for="address">Address:</label>*/
/*             <input type="text" class="form-control" name="address" value="{{ place.address }}"  />*/
/*             {% if errors.address %}<span class="help-block">{{ errors.address.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group {% if errors.suburb %}has-error{% endif %}">*/
/*             <label class="control-label" for="suburb">Suburb:</label>*/
/*             <input type="text" class="form-control" name="suburb" value="{{ place.suburb }}"  />*/
/*             {% if errors.suburb %}<span class="help-block">{{ errors.suburb.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group {% if errors.postcode %}has-error{% endif %}">*/
/*             <label class="control-label" for="postcode">Postcode:</label>*/
/*             <input type="text" class="form-control" name="postcode" value="{{ place.postcode }}"  />*/
/*             {% if errors.postcode %}<span class="help-block">{{ errors.postcode.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*           */
/*         <div class="form-group">*/
/*             <label for="tag_id">Select Category:</label>*/
/*             <select class="form-control" name="tag_id">*/
/*                 {% for idx,  tag in tags %}*/
/*                     <option value="{{ idx }}" {%if tag == place.short %}selected{% endif %}>{{ tag }}</option>*/
/*                 {% endfor %}*/
/*             </select>*/
/*         </div>*/
/* */
/*         <hr>*/
/* */
/*         <input type="hidden" name="csrf_name" value="{{ csrf.name }}">*/
/*         <input type="hidden" name="csrf_value" value="{{ csrf.value }}">*/
/*         <button type="submit" class="btn btn-primary">Submit</button>*/
/*         <a class="btn btn-default" href="{{ path_for('places-all') }}">Cancel</a>*/
/* */
/*     </form>*/
/* */
/* {% endblock %}*/
