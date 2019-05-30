<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/competences", name="competences")
     */
    public function competencesAction()
    {
        return $this->render('default/competences.html.twig');
    }
    /**
     * @route("/realisations", name="realisations")
     */
    public function realisationsAction()
    {
        return $this->render('default/realisations.html.twig');
    }
     /**
     * @route("/mentionslegales", name="mentionslegales")
     */
    public function mentionsLegalesAction()
    {
        return $this->render('default/mentions_legales.html.twig');
    }
    /**
    * @route("/prestations", name="prestations")
    */
    public function prestationsAction()
    {
        return $this->render('default/prestations.html.twig');
    }
    /**
     * @route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // Create the form according to the FormType created previously.
        // And give the proper parameters
        $form = $this->createForm('AppBundle\Form\ContactType', null, array(
            // To set the action use $this->generateUrl('route_identifier')
            'action' => $this->generateUrl('contact'),
            'method' => 'POST'
        ));

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                // Send mail
                if ($this->sendEmail($form->getData())) {
                    //FLASH MESSAGE FOR REDIRECTION
                    $request
                        ->getSession()
                        ->getFlashBag()
                        ->add('ajoute', 'Le message a bien été transmis ! Merci');

                    return $this->redirectToRoute('contact');
                }
            }
        }
        return $this->render('default/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    private function sendEmail($data)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($data["subject"])
            ->setFrom($data["email"])
            ->setReplyTo($data["email"])
            ->setTo('contact@arnaudbesnard.fr')
            ->setContentType('text/html')
            ->setBody($data["message"]);

        if (!$this->get('mailer')->send($message)) {
            throw new Exception('Le mail n\'a pas pu être envoyé');
        }
    }
}
