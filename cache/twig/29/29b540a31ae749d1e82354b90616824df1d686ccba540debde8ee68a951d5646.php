<?php

/* customers/login.twig */
class __TwigTemplate_2def4edf3cfe905d53997a0f5b0228e657a6479f1c2a89af25a8a3d3f33352cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "customers/login.twig", 1);
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
    <h1>Login</h1>


    <form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("login"), "html", null, true);
        echo "\" method=\"post\">

        <div class=\"form-group ";
        // line 10
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "username", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"username\"> Username or email</label>
            <input type=\"text\" class=\"form-control\" name=\"username\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "username", array()), "html", null, true);
        echo "\"  />
            ";
        // line 13
        if ($this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "username", array()), 0, array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "username", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 14
        echo "        </div>

        <div class=\"form-group ";
        // line 16
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"password\"> Password</label>
            <input type=\"text\" class=\"form-control\" name=\"password\" value=\"\"  />
            ";
        // line 19
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 20
        echo "        </div>

        <hr>

        <input type=\"hidden\" name=\"csrf_name\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "name", array()), "html", null, true);
        echo "\">
        <input type=\"hidden\" name=\"csrf_value\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "value", array()), "html", null, true);
        echo "\">  
        <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
        <a class=\"btn btn-default\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("home"), "html", null, true);
        echo "\">Cancel</a>

    </form>
    <div>       
        <p></p>
        <p></p>
";
        // line 34
        echo "        <p>Not a member:  <a class=\"btn btn-default\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("register"), "html", null, true);
        echo "\">Register Here</a>  <p> 


    </div>

";
    }

    public function getTemplateName()
    {
        return "customers/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 34,  92 => 27,  87 => 25,  83 => 24,  77 => 20,  71 => 19,  63 => 16,  59 => 14,  53 => 13,  49 => 12,  42 => 10,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <h1>Login</h1>*/
/* */
/* */
/*     <form action="{{ path_for('login') }}" method="post">*/
/* */
/*         <div class="form-group {% if errors.username %}has-error{% endif %}">*/
/*             <label class="control-label" for="username"> Username or email</label>*/
/*             <input type="text" class="form-control" name="username" value="{{ customer.username }}"  />*/
/*             {% if  errors.username.0  %}<span class="help-block">{{ errors.username.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <div class="form-group {% if errors.password %}has-error{% endif %}">*/
/*             <label class="control-label" for="password"> Password</label>*/
/*             <input type="text" class="form-control" name="password" value=""  />*/
/*             {% if errors.password %}<span class="help-block">{{ errors.password.0 }}</span>{% endif %}*/
/*         </div>*/
/* */
/*         <hr>*/
/* */
/*         <input type="hidden" name="csrf_name" value="{{ csrf.name }}">*/
/*         <input type="hidden" name="csrf_value" value="{{ csrf.value }}">  */
/*         <button type="submit" class="btn btn-primary">Submit</button>*/
/*         <a class="btn btn-default" href="{{ path_for('home') }}">Cancel</a>*/
/* */
/*     </form>*/
/*     <div>       */
/*         <p></p>*/
/*         <p></p>*/
/* {#        <p>Not a member:  <a class="btn btn-default" href="{{ path_for('register') }}">Register Here</a>  <p> #}*/
/*         <p>Not a member:  <a class="btn btn-default" href="{{ path_for('register') }}">Register Here</a>  <p> */
/* */
/* */
/*     </div>*/
/* */
/* {% endblock %}{# empty Twig template #}*/
/* */
