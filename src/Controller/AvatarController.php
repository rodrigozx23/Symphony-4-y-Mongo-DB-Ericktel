<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Document\DataForm;
use Symfony\Component\HttpFoundation\Request; 
use App\Form\FormValidationType; 
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\EmailType; 
use Symfony\Component\Form\Extension\Core\Type\TextareaType; 
use Symfony\Component\HttpFoundation\JsonResponse;

class AvatarController extends Controller
{
    /**
     * @Route("/avatar", name="avatar")
     */
    public function index()
    {
        return $this->render('avatar/index.html.twig', [
            'controller_name' => 'AvatarController',
        ]);
    }

    /**
     * @Route("/avatar2", name="avatar2")
     */
    public function index2()
    {
        // create blog post
        $post = new DataForm();
        $post->setNombre('a');
        $post->setCorreo('b');
        $post->setTelefono('c');
        $post->setMensaje('d');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($post);

        // store everything to MongoDB
        $dm->flush();
        return new Response('<html><body>HELLO From Response</body></html>');
    }

    //FORMULARIO CREADO CON PURO SYMFONY.
    /** 
      * @Route("/Form", name="DataForm") 
    */ 
    public function autoform(Request $request) {  
    $stud = new DataForm(); 
    $form = $this->createFormBuilder($stud) 
       ->add('Nombre', TextType::class)
       ->add('Telefono', TextType::class) 
       ->add('Mensaje', TextType::class)     
       ->add('Correo', EmailType::class)   
       ->add('save', SubmitType::class, array('label' => 'Submit')) 
       ->getForm();
       $form->handleRequest($request); 
        
       if ($form->isSubmitted() && $form->isValid()) { 
          $validate = $form->getData(); 
            //var_dump($validate);
            //create blog post
            $post = new DataForm();
            $post->setNombre($validate->getNombre());
            $post->setCorreo($validate->getCorreo());
            $post->setTelefono($validate->getTelefono());
            $post->setMensaje($validate->getMensaje());
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($post);
            // store everything to MongoDB
            $dm->flush();
          return new Response('Form is validated.'); 
       }    
       return $this->render('avatar/new.html.twig', array( 
          'form' => $form->createView(), 
       )); 
    } 
    
    // REDIRECCION A VISTA CREADA PARA EL FORMULARIO QUE USA AJAX
    /**
     * @Route("/manualForm", name="ManualForm")
     */
    public function manualForm()
    {
        return $this->render('avatar/form.html.twig');
    }
    
    // GUARDAR FORMULARIO ENVIADO DE AJAX
    /** 
      * @Route("/AjaxSave", name="AjaxManualForm") 
    */ 
    public function ajaxGuardar(Request $request) {  
      if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {   

              //$validate = $request->getData(); 
              //var_dump($validate);
              //create blog post
              $post = new DataForm();
              $post->setNombre($request->get("nombre"));
              $post->setCorreo($request->get("correo"));
              $post->setTelefono($request->get("telefono"));
              $post->setMensaje($request->get("mensaje"));
              $dm = $this->get('doctrine_mongodb')->getManager();
              $dm->persist($post);
              // store everything to MongoDB
              $dm->flush();
              $response = array(
                'status' => true,
                'message' => 'Success',
                'data' => 'Su elemento fue guardado exitosamente',
            );
            $res = new JsonResponse();
            $res->setData(['data' => $response]);
              //var_dump($res);
            return $res; 
      }
      else { 
          $response = array(
            'status' => false,
            'message' => 'error',
          );
          return new JsonResponse(['data' => json_encode($response)]);  
      } 
    }
    //FIN DE INSERCION POR POST CON AJAX 
}
