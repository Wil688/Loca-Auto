<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;


class UserPromoteCommand extends Command{
//{
//    //protected static $defaultName = 'app:user:promote';
//    protected static $defaultDescription = 'Add a short description for your command';
//
//    protected function configure(): void
//    {
//        $this
//            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
//        ;
//    }
//
//    protected function execute(InputInterface $input, OutputInterface $output): int
//    {
//        $io = new SymfonyStyle($input, $output);
//        $arg1 = $input->getArgument('arg1');
//
//        if ($arg1) {
//            $io->note(sprintf('You passed an argument: %s', $arg1));
//        }
//
//        if ($input->getOption('option1')) {
//            // ...
//        }
//
//        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
//
//        return Command::SUCCESS;
//    }


//config Mamadou

// src/Command/UserPromoteCommand.php

    protected static $defaultName = 'app:user:promote';

    private $om;

    public function __construct(EntityManagerInterface $om)
    {
        $this->om = $om;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Promote a user by adding him a new roles.')
            ->addArgument('email', InputArgument::REQUIRED, 'Email address of the user you want to promote.')
            ->addArgument('roles', InputArgument::REQUIRED, 'The roles you want to add to the user.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $roles = $input->getArgument('roles');

        $userRepository = $this->om->getRepository(User::class);
        $user = $userRepository->findOneByEmail($email);

        if ($user) {
            $user->addRoles($roles);
            $this->om->flush();

            $io->success('The roles has been successfully added to the user.');
        } else {
            $io->error('There is no user with that email address.');
        }

        return 0;
    }
}