<?php

namespace App\Form;

use App\Entity\CompetitionTeams;
use App\Entity\MatchesGroup;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchesGroupType extends AbstractType
{

    private $request;
    private $requeststack;
    public function __construct(RequestStack $request)
    {
        $this->request = $request->getMasterRequest();
        $this->requeststack = $request;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('team1', EntityType::class, array(
                'class' => CompetitionTeams::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.team', 'ASC');
                },
                'choice_label' => 'team',
            ))
            ->add('team2', EntityType::class, array(
                'class' => CompetitionTeams::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.team', 'ASC');
                },
                'choice_label' => 'team',
            ))
            ->add('section', ChoiceType::class, array(
                'choices'=>array(
                    'A'=>'A',
                    'B'=>'B',
                    'C'=>'C',
                    'D'=>'D',
                    'E'=>'E',
                    'F'=>'F',
                    'G'=>'G',
                    'H'=>'H'

                )
            ))
            ->add('dueDate', DateType::class)
            ->add('submit', SubmitType::class)
        ;

        $builder->addEventListener(FormEvents::POST_SET_DATA, [$this, 'postSetData']);
    }

    public function postSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        $entity = $form->getData();
        $route = $this->request->get('_route');
        //switcher les remove selon le nom des routes
        switch ($route) {
            case 'group_add_result':
                $form->add('scoreTeam1', ChoiceType::class, array(
                    'choices'=>array(
                        '1'=> '1',
                        '2'=> '2',
                        '3'=> '3',
                        '4'=> '4',
                        '5'=> '5',
                        '6'=> '6',
                        '7'=> '7',
                        '8'=> '8',
                        '9'=> '9',
                        '10'=> '10'
                    )
                ));
                $form->add('scoreTeam2', ChoiceType::class, array(
                    'choices'=>array(
                        '1'=> '1',
                        '2'=> '2',
                        '3'=> '3',
                        '4'=> '4',
                        '5'=> '5',
                        '6'=> '6',
                        '7'=> '7',
                        '8'=> '8',
                        '9'=> '9',
                        '10'=> '10'
                    )
                ));

                $form->remove('team1');
                $form->remove('team2');
                $form->remove('section');
                $form->remove('dueDate');

                break;

        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MatchesGroup::class,
        ]);
    }
}
