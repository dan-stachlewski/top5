<?php

/* places/places_delete.twig */
class __TwigTemplate_4fae5436f93ea5b181aed1541ec84180c4912e70f5d0220f08c205a9240c89a7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "places/places_delete.twig", 1);
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
        echo "    <div class=\"well\">
        <h2>Do you really want to delete ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo "?</h2>
    </div>
    <div class=\"well\">    
        <h3>Name: ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo "</h3>
        <h3>Address: ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "address", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "suburb", array()), "html", null, true);
        echo "</h3>
        <h4>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo "will be deleted! Ary you sure?</h4>
    </div>
    
    <div class=\"well\">    
        <form action=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["OK_link"]) ? $context["OK_link"] : null), "html", null, true);
        echo "\" method=\"post\">
        <input type=\"hidden\" name=\"csrf_name\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "name", array()), "html", null, true);
        echo "\">
        <input type=\"hidden\" name=\"csrf_value\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "value", array()), "html", null, true);
        echo "\">
        <button type=\"submit\" class=\"btn btn-danger\">Delete</button>
        <a class=\"btn btn-warning\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-all"), "html", null, true);
        echo "\">Cancel</a>
    </div>
    </form>

";
    }

    public function getTemplateName()
    {
        return "places/places_delete.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 18,  65 => 16,  61 => 15,  57 => 14,  50 => 10,  44 => 9,  40 => 8,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/*     <div class="well">*/
/*         <h2>Do you really want to delete {{ place.name }}?</h2>*/
/*     </div>*/
/*     <div class="well">    */
/*         <h3>Name: {{ place.name }}</h3>*/
/*         <h3>Address: {{ place.address }} {{ place.suburb }}</h3>*/
/*         <h4>{{ place.name }}will be deleted! Ary you sure?</h4>*/
/*     </div>*/
/*     */
/*     <div class="well">    */
/*         <form action="{{ OK_link }}" method="post">*/
/*         <input type="hidden" name="csrf_name" value="{{ csrf.name }}">*/
/*         <input type="hidden" name="csrf_value" value="{{ csrf.value }}">*/
/*         <button type="submit" class="btn btn-danger">Delete</button>*/
/*         <a class="btn btn-warning" href="{{ path_for('places-all') }}">Cancel</a>*/
/*     </div>*/
/*     </form>*/
/* */
/* {% endblock %}*/
/* */
