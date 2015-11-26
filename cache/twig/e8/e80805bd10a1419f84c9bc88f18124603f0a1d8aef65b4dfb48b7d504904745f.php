<?php

/* layout.twig */
class __TwigTemplate_4267c0dacaaf793786f3919deaa230031bca7840a67bf216ec7daeb4370adbdd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'flash_messages' => array($this, 'block_flash_messages'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 9
        echo "    </head>
    
    <body>
        ";
        // line 12
        $this->displayBlock('flash_messages', $context, $blocks);
        // line 42
        echo "
        <div class=\"row\">
            <div class=\"col-lg-12\">
                ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 48
        echo "
            </div>
        </div>
    </div>
</body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <title>TODO supply a title</title>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        ";
    }

    // line 12
    public function block_flash_messages($context, array $blocks = array())
    {
        // line 13
        echo "            ";
        if ($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "success", array())) {
            // line 14
            echo "                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            ";
            // line 18
            echo "                            <ul>
                                ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "success", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 20
                echo "                                    <li>";
                echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                echo "</li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "                            </ul>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 27
        echo "            ";
        if ($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "danger", array())) {
            // line 28
            echo "                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            ";
            // line 32
            echo "                            <ul>
                                ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "danger", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 34
                echo "                                    <li>";
                echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                echo "</li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "                            </ul>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 41
        echo "        ";
    }

    // line 45
    public function block_content($context, array $blocks = array())
    {
        // line 46
        echo "                    ";
        // line 47
        echo "                ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  137 => 47,  135 => 46,  132 => 45,  128 => 41,  121 => 36,  112 => 34,  108 => 33,  105 => 32,  100 => 28,  97 => 27,  90 => 22,  81 => 20,  77 => 19,  74 => 18,  69 => 14,  66 => 13,  63 => 12,  56 => 5,  53 => 4,  43 => 48,  41 => 45,  36 => 42,  34 => 12,  29 => 9,  27 => 4,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         {% block head %}*/
/*             <title>TODO supply a title</title>*/
/*             <meta charset="UTF-8">*/
/*             <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*         {% endblock %}*/
/*     </head>*/
/*     */
/*     <body>*/
/*         {% block flash_messages %}*/
/*             {% if flash_messages.success %}*/
/*                 <div class="row">*/
/*                     <div class="col-lg-12">*/
/*                         <div class="alert alert-success" role="alert">*/
/*                             {# display flash messages #}*/
/*                             <ul>*/
/*                                 {% for msg in flash_messages.success %}*/
/*                                     <li>{{ msg }}</li>*/
/*                                     {% endfor %}*/
/*                             </ul>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             {% endif %}*/
/*             {% if flash_messages.danger %}*/
/*                 <div class="row">*/
/*                     <div class="col-lg-12">*/
/*                         <div class="alert alert-danger" role="alert">*/
/*                             {# display flash messages #}*/
/*                             <ul>*/
/*                                 {% for msg in flash_messages.danger %}*/
/*                                     <li>{{ msg }}</li>*/
/*                                     {% endfor %}*/
/*                             </ul>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             {% endif %}*/
/*         {% endblock %}*/
/* */
/*         <div class="row">*/
/*             <div class="col-lg-12">*/
/*                 {% block content %}*/
/*                     {# Main Page content #}*/
/*                 {% endblock %}*/
/* */
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </body>*/
/* </html>*/
/* */
