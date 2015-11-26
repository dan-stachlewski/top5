<?php

/* places/places_all.twig */
class __TwigTemplate_50de166508bb57a78869a0bfca9a621007410dbcc6fb30b27f4770335acf6c31 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "places/places_all.twig", 1);
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
        <h2>All Places</h2>
    </div>

    ";
        // line 9
        if ((isset($context["places"]) ? $context["places"] : null)) {
            // line 10
            echo "        <div class=\"row\">

            <table class=\"table table-striped table-bordered\">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>address</th>
                        <th>suburb</th>
                        <th>postcode</th>
                        <th>tag_id</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["places"]) ? $context["places"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["place"]) {
                // line 25
                echo "                        <tr>
                            <td>";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["place"], "name", array()), "html", null, true);
                echo "</td>
                            <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($context["place"], "address", array()), "html", null, true);
                echo "</td>
                            <td>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["place"], "suburb", array()), "html", null, true);
                echo "</td>
                            <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["place"], "postcode", array()), "html", null, true);
                echo "</td>
                            <td> ";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["place"], "tag_id", array()), "html", null, true);
                echo "  <td>
                            <td>    
                                <a class=\"btn btn-info\" href=\"\">Show</a>
                                <a class=\"btn btn-success\" href=\"\">Edit</a>
                                <a class=\"btn btn-danger\" href=\"\">Delete</a>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['place'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "
                </tbody>
            </table>

        </div>
        <a class=\"btn btn-danger\" href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-add"), "html", null, true);
            echo "\">New Place</a>
    ";
        } else {
            // line 45
            echo "        <div class=\"row\">
            <h5>No places found</h5>
        </div>
    ";
        }
        // line 48
        echo "    
";
    }

    public function getTemplateName()
    {
        return "places/places_all.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 48,  105 => 45,  100 => 43,  93 => 38,  79 => 30,  75 => 29,  71 => 28,  67 => 27,  63 => 26,  60 => 25,  56 => 24,  40 => 10,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="row">*/
/*         <h2>All Places</h2>*/
/*     </div>*/
/* */
/*     {% if places %}*/
/*         <div class="row">*/
/* */
/*             <table class="table table-striped table-bordered">*/
/*                 <thead>*/
/*                     <tr>*/
/*                         <th>Name</th>*/
/*                         <th>address</th>*/
/*                         <th>suburb</th>*/
/*                         <th>postcode</th>*/
/*                         <th>tag_id</th>*/
/*                         <th></th>*/
/*                     </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                     {% for place in places %}*/
/*                         <tr>*/
/*                             <td>{{ place.name }}</td>*/
/*                             <td>{{ place.address }}</td>*/
/*                             <td>{{ place.suburb }}</td>*/
/*                             <td>{{ place.postcode }}</td>*/
/*                             <td> {{ place.tag_id }}  <td>*/
/*                             <td>    */
/*                                 <a class="btn btn-info" href="">Show</a>*/
/*                                 <a class="btn btn-success" href="">Edit</a>*/
/*                                 <a class="btn btn-danger" href="">Delete</a>*/
/*                             </td>*/
/*                         </tr>*/
/*                     {% endfor %}*/
/* */
/*                 </tbody>*/
/*             </table>*/
/* */
/*         </div>*/
/*         <a class="btn btn-danger" href="{{ path_for('places-add')}}">New Place</a>*/
/*     {% else %}*/
/*         <div class="row">*/
/*             <h5>No places found</h5>*/
/*         </div>*/
/*     {% endif %}    */
/* {% endblock %}{# empty Twig template #}*/
/* */
