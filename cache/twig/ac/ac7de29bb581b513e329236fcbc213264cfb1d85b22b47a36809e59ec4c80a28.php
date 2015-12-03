<?php

/* customers/customer_register.twig */
class __TwigTemplate_5cafbb04f3a1a8590c4106bfc2a02366e1f1d2cee2e9fdda44201e2f2b976e92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "customers/customer_register.twig", 1);
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
    <h2>Register</h2>
    <h4>Please enter your details</h4>

    <form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("register"), "html", null, true);
        echo "\" method=\"post\">

          <div class=\"form-group ";
        // line 10
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "username", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"username\">Username:</label>
            <input type=\"text\" class=\"form-control\" name=\"username\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customers"]) ? $context["customers"] : null), "username", array()), "html", null, true);
        echo "\"  />
            ";
        // line 13
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "username", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "username", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 14
        echo "        </div>
        
         <div class=\"form-group ";
        // line 16
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "email", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"email\">Email: </label>
            <input type=\"text\" class=\"form-control\" name=\"email\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customers"]) ? $context["customers"] : null), "email", array()), "html", null, true);
        echo "\"  />
            ";
        // line 19
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "email", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "email", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 20
        echo "        </div>
       
        <div class=\"form-group ";
        // line 22
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array())) {
            echo "has-error";
        }
        echo "\">
            <label class=\"control-label\" for=\"password\">Password: </label>
            <input type=\"text\" class=\"form-control\" name=\"password\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customers"]) ? $context["customers"] : null), "password", array()), "html", null, true);
        echo "\"  />
            ";
        // line 25
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array())) {
            echo "<span class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array()), 0, array()), "html", null, true);
            echo "</span>";
        }
        // line 26
        echo "        </div>
        <hr>
        <input type=\"hidden\" name=\"csrf_name\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "name", array()), "html", null, true);
        echo "\">
        <input type=\"hidden\" name=\"csrf_value\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["csrf"]) ? $context["csrf"] : null), "value", array()), "html", null, true);
        echo "\">
        <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
";
        // line 32
        echo "        <a class=\"btn btn-default\" href=\"\">Cancel</a>

    </form>

";
    }

    public function getTemplateName()
    {
        return "customers/customer_register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 32,  109 => 29,  105 => 28,  101 => 26,  95 => 25,  91 => 24,  84 => 22,  80 => 20,  74 => 19,  70 => 18,  63 => 16,  59 => 14,  53 => 13,  49 => 12,  42 => 10,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <h2>Register</h2>*/
/*     <h4>Please enter your details</h4>*/
/* */
/*     <form action="{{ path_for('register') }}" method="post">*/
/* */
/*           <div class="form-group {% if errors.username %}has-error{% endif %}">*/
/*             <label class="control-label" for="username">Username:</label>*/
/*             <input type="text" class="form-control" name="username" value="{{ customers.username}}"  />*/
/*             {% if errors.username %}<span class="help-block">{{ errors.username.0 }}</span>{% endif %}*/
/*         </div>*/
/*         */
/*          <div class="form-group {% if errors.email %}has-error{% endif %}">*/
/*             <label class="control-label" for="email">Email: </label>*/
/*             <input type="text" class="form-control" name="email" value="{{ customers.email}}"  />*/
/*             {% if errors.email %}<span class="help-block">{{ errors.email.0 }}</span>{% endif %}*/
/*         </div>*/
/*        */
/*         <div class="form-group {% if errors.password %}has-error{% endif %}">*/
/*             <label class="control-label" for="password">Password: </label>*/
/*             <input type="text" class="form-control" name="password" value="{{ customers.password}}"  />*/
/*             {% if errors.password %}<span class="help-block">{{ errors.password.0 }}</span>{% endif %}*/
/*         </div>*/
/*         <hr>*/
/*         <input type="hidden" name="csrf_name" value="{{ csrf.name }}">*/
/*         <input type="hidden" name="csrf_value" value="{{ csrf.value }}">*/
/*         <button type="submit" class="btn btn-primary">Submit</button>*/
/* {#        <a class="btn btn-default" href="{{ path_for('customer-edit') }}">Cancel</a>#}*/
/*         <a class="btn btn-default" href="">Cancel</a>*/
/* */
/*     </form>*/
/* */
/* {% endblock %}*/
/* */
