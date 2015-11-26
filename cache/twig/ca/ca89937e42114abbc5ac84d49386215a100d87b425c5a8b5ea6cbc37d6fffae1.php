<?php

/* errors/404.twig */
class __TwigTemplate_7b0471bb1734f3b09082cd6e522b210ff0f621c6fccb6f0870340a3a0ff95cb2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "errors/404.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'messgage' => array($this, 'block_messgage'),
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"jumbotron\">
        <div class=\"container\">
            ";
        // line 5
        $this->displayBlock('messgage', $context, $blocks);
        // line 9
        echo "            <p><a class=\"btn btn-danger btn-lg\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("home"), "html", null, true);
        echo "\" role=\"button\">
                    Back to docs &raquo;</a>
            </p>
        </div>
    </div>
";
    }

    // line 5
    public function block_messgage($context, array $blocks = array())
    {
        // line 6
        echo "                <h2>The page does not exists</h2>
                <p>Please check the spelling and try again</p>
            ";
    }

    public function getTemplateName()
    {
        return "errors/404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 6,  49 => 5,  38 => 9,  36 => 5,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* {% block content %}*/
/*     <div class="jumbotron">*/
/*         <div class="container">*/
/*             {% block messgage %}*/
/*                 <h2>The page does not exists</h2>*/
/*                 <p>Please check the spelling and try again</p>*/
/*             {% endblock %}*/
/*             <p><a class="btn btn-danger btn-lg" href="{{ path_for('home') }}" role="button">*/
/*                     Back to docs &raquo;</a>*/
/*             </p>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
