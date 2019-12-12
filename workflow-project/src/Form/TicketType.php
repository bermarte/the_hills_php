<?php

namespace App\Form;

use App\Entity\Ticket;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;




class TicketType extends AbstractType
{
    //get the current user
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //current user
        $user = $this->security->getUser();

        $builder
            ->add('text_body')
            ->add('customer_comment')
            ->add('is_open')
            ->add('user_id', HiddenType::class, [
                'data' => $user,
            ]);

             /*
             ->add('user_id')
             ->add('is_public')
             ->add('is_in_progress')
             ->add('agent_comment')
             ->add('is_waiting_for_feedback')
             ->add('is_escalated')
             ->add('relation')
             */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
