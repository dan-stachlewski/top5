<?php

/* places/places_show.twig */
class __TwigTemplate_3ddd484df5a25ccb8d5cfcb8cf99d0237ca70d53db75c1a467477bc2af7664e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "places/places_show.twig", 1);
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
    <div class=\"row\">
        <h2>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo " Information</h2>
    </div>

    <div class=\"row\">
            <img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->baseUrl(), "html", null, true);
        echo "/images/generic-place-small.png\">
    </div>
    <div class=\"row\">
        <table class=\"table table-striped table-bordered\">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Place Name:</td>
                    <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "address", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Suburb:</td>
                    <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "suburb", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Postcode:</td>
                    <td>";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "postcode", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "short", array()), "html", null, true);
        echo "</td>
                </tr>
            </tbody>
        </table>
        
        <!-- 
            ***
             * Need to add 
               - Google Map of the Place Location
               - Auto Retrieve the:
                - latitude
                - longditude
             * based on the PostCode <-- need to confirm
             * Populate the:
                - latitude
                - longitude
             * automatically
         -->
            <div class=\"well\">

                <h2>";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "name", array()), "html", null, true);
        echo " Google Map:</h2>
                
                <!-- Google Map goes here... -->

            </div>

            <div class=\"well\">
                <a class=\"btn btn-primary\" href=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-all"), "html", null, true);
        echo "\">Browse All Users</a>
                <a class=\"btn btn-success\" href=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-edit", array("id" => $this->getAttribute((isset($context["place"]) ? $context["place"] : null), "place_id", array()))), "html", null, true);
        echo "\">Edit</a>
    
            </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "places/places_show.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 67,  119 => 66,  109 => 59,  86 => 39,  79 => 35,  72 => 31,  65 => 27,  58 => 23,  42 => 10,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="row">*/
/*         <h2>{{ place.name }} Information</h2>*/
/*     </div>*/
/* */
/*     <div class="row">*/
/*             <img src="{{ base_url()}}/images/generic-place-small.png">*/
/*     </div>*/
/*     <div class="row">*/
/*         <table class="table table-striped table-bordered">*/
/*             <thead>*/
/*                 <tr>*/
/*                     <th>Field</th>*/
/*                     <th>Value</th>*/
/*                 </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*                 <tr>*/
/*                     <td>Place Name:</td>*/
/*                     <td>{{ place.name }}</td>*/
/*                 </tr>*/
/*                 <tr>*/
/*                     <td>Address:</td>*/
/*                     <td>{{ place.address }}</td>*/
/*                 </tr>*/
/*                 <tr>*/
/*                     <td>Suburb:</td>*/
/*                     <td>{{ place.suburb }}</td>*/
/*                 </tr>*/
/*                 <tr>*/
/*                     <td>Postcode:</td>*/
/*                     <td>{{ place.postcode }}</td>*/
/*                 </tr>*/
/*                 <tr>*/
/*                     <td>Category:</td>*/
/*                     <td>{{ place.short }}</td>*/
/*                 </tr>*/
/*             </tbody>*/
/*         </table>*/
/*         */
/*         <!-- */
/*             ****/
/*              * Need to add */
/*                - Google Map of the Place Location*/
/*                - Auto Retrieve the:*/
/*                 - latitude*/
/*                 - longditude*/
/*              * based on the PostCode <-- need to confirm*/
/*              * Populate the:*/
/*                 - latitude*/
/*                 - longitude*/
/*              * automatically*/
/*          -->*/
/*             <div class="well">*/
/* */
/*                 <h2>{{ place.name }} Google Map:</h2>*/
/*                 */
/*                 <!-- Google Map goes here... -->*/
/* */
/*             </div>*/
/* */
/*             <div class="well">*/
/*                 <a class="btn btn-primary" href="{{ path_for('places-all') }}">Browse All Users</a>*/
/*                 <a class="btn btn-success" href="{{ path_for('places-edit', {'id':place.place_id})}}">Edit</a>*/
/*     */
/*             </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
