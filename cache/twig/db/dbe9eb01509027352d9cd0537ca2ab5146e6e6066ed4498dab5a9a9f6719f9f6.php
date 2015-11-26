<?php

/* places/places_add.twig */
class __TwigTemplate_102b21edd4aa400042b097d2cfa0940abf6ca21a17a753495ff78a06325a214f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "places/places_add.twig", 1);
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
    <h2>Add new place</h2>
    <h4>Please enter new place details</h4>

    <form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-add"), "html", null, true);
        echo "\" method=\"post\">

        <div class=\"form-group ";
        // line 10
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "name", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"user_name\">Place Name:</label>
            <input type=\"text\" class=\"form-control\" name=\"user_name\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "user_name", array()), "html", null, true);
        echo "\"  />
            ";
        // line 13
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "user_name", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "user_name", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 14
        echo "        </div>

        <div class=\"form-group ";
        // line 16
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "address", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"full_name\">Address:</label>
            <input type=\"text\" class=\"form-control\" name=\"full_name\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "full_name", array()), "html", null, true);
        echo "\"  />
            ";
        // line 19
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "full_name", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "full_name", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 20
        echo "        </div>

        <div class=\"form-group ";
        // line 22
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "email", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"email\">Email: </label>
            <input type=\"text\" class=\"form-control\" name=\"email\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "\"  />
            ";
        // line 25
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "email", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "email", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 26
        echo "        </div>

        <div class=\"form-group ";
        // line 28
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"password\">Password: </label>
            <input type=\"text\" class=\"form-control\" name=\"password\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "password", array()), "html", null, true);
        echo "\"  />
            ";
        // line 31
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 32
        echo "        </div>

        <div class=\"form-group\">
            <label for=\"tag_id\">Select Category:</label>
            <select class=\"form-control\" name=\"tag_id\">
                ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tags"]) ? $context["tags"] : null));
        foreach ($context['_seq'] as $context["idx"] => $context["tag"]) {
            // line 38
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $context["idx"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["tag"], "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['idx'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "            </select>
        </div>

        <hr>

        <input type=\"hidden\" name=\"csrf_name\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "name", array()), "html", null, true);
        echo "\">
        <input type=\"hidden\" name=\"csrf_value\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "value", array()), "html", null, true);
        echo "\">
        <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
        <a class=\"btn btn-default\"  href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("places-all"), "html", null, true);
        echo "\">Cancel</a>

    </form>

";
    }

    public function getTemplateName()
    {
        return "places/places_add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 48,  155 => 46,  151 => 45,  144 => 40,  133 => 38,  129 => 37,  122 => 32,  116 => 31,  112 => 30,  105 => 28,  101 => 26,  95 => 25,  91 => 24,  84 => 22,  80 => 20,  74 => 19,  70 => 18,  63 => 16,  59 => 14,  53 => 13,  49 => 12,  42 => 10,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <h2>Add new place</h2>*/
/*     <h4>Please enter new place details</h4>*/
/* */
/*     <form action="{{ path_for('places-add') }}" method="post">*/
/* */
/*         <div class="form-group {% if errors.name %}has-error{% endif %}">*/
/*             <label class="control-label" for="user_name">Place Name:</label>*/
/*             <input type="text" class="form-control" name="user_name" value="{{ user.user_name}}"  />*/
/*             {% if errors.user_name %}<span class="help-block">{{ errors.user_name.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group {% if errors.address %}has-error{% endif %}">*/
/*             <label class="control-label" for="full_name">Address:</label>*/
/*             <input type="text" class="form-control" name="full_name" value="{{ user.full_name}}"  />*/
/*             {% if errors.full_name %}<span class="help-block">{{ errors.full_name.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group {% if errors.email %}has-error{% endif %}">*/
/*             <label class="control-label" for="email">Email: </label>*/
/*             <input type="text" class="form-control" name="email" value="{{ user.email}}"  />*/
/*             {% if errors.email %}<span class="help-block">{{ errors.email.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group {% if errors.password %}has-error{% endif %}">*/
/*             <label class="control-label" for="password">Password: </label>*/
/*             <input type="text" class="form-control" name="password" value="{{ user.password}}"  />*/
/*             {% if errors.password %}<span class="help-block">{{ errors.password.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group">*/
/*             <label for="tag_id">Select Category:</label>*/
/*             <select class="form-control" name="tag_id">*/
/*                 {% for idx, tag in tags %}*/
/*                     <option value="{{ idx }}">{{ tag }}</option>*/
/*                 {% endfor %}*/
/*             </select>*/
/*         </div>*/
/* */
/*         <hr>*/
/* */
/*         <input type="hidden" name="csrf_name" value="{{ csrf.name }}">*/
/*         <input type="hidden" name="csrf_value" value="{{ csrf.value }}">*/
/*         <button type="submit" class="btn btn-primary">Submit</button>*/
/*         <a class="btn btn-default"  href="{{ path_for('places-all') }}">Cancel</a>*/
/* */
/*     </form>*/
/* */
/* {% endblock %}*/
/* */
