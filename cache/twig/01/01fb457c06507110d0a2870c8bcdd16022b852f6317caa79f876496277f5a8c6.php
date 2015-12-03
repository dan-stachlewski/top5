<?php

/* /home/homepage_structure.twig */
class __TwigTemplate_d9ad6f02ce61c7a7f0d8c8be43a00b2d6e1b7ea65603680b1750a02a600f5dc1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "/home/homepage_structure.twig", 1);
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
        echo "    ";
        echo (isset($context["page_content"]) ? $context["page_content"] : null);
        echo "
    <h2>We have the Top 5 for:</h2>
    <ul>
    <li>
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tags"]) ? $context["tags"] : null));
        foreach ($context['_seq'] as $context["idx"] => $context["tag"]) {
            // line 9
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $context["idx"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["tag"], "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['idx'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </li>
    </ul>

";
    }

    public function getTemplateName()
    {
        return "/home/homepage_structure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 11,  43 => 9,  39 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/*     {{ page_content|raw }}*/
/*     <h2>We have the Top 5 for:</h2>*/
/*     <ul>*/
/*     <li>*/
/*         {% for idx, tag in tags %}*/
/*         <option value="{{ idx }}">{{ tag }}</option>*/
/*         {% endfor %}*/
/*     </li>*/
/*     </ul>*/
/* */
/* {% endblock %}*/
