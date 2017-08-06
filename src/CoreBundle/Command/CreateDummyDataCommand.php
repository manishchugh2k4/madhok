<?php
namespace CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use CoreBundle\Entity\User;
use CoreBundle\Entity\Setting;

class CreateDummyDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('dummy:data')
            ->setDescription('For admin one time dummy data')
            ->addArgument('email', InputArgument::REQUIRED, 'Give your email?')
            ->addArgument('password', InputArgument::REQUIRED, 'Give your password?')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');

        $em = $this->getContainer()->get('doctrine')->getManager();

        $checkIfUserExist = $em->getRepository('CoreBundle:User')->findBy(array(
            'email' => $email
        ));
        if (count($checkIfUserExist)<=0) {

            $user = new User();

            $encoder = $this->getContainer()->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $password);
            $user->setPassword($encoded);

            $user->setEmail($email);
            $user->setRole('ROLE_ADMIN');

            $em->persist($user);
            $em->flush();
  
            $text = "Added Successfully.";
        } else {

            $text = $email." Already exists.";
        }

        $output->writeln($text);
    }
}