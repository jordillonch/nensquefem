<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 02/09/12 11:18
 */

namespace NensQueFem\Bundle\ParsersBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

/**
 * Run robots for NensQueFem
 */
class RunRobotsCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('nensquefem:robots:run')
            ->setDescription('Llança les aranyes, parseja i guarda les dades')
            ->addOption('robot-id', null, InputOption::VALUE_OPTIONAL, 'Número del robot a llançar. Si no s\'especifica, es llencen tots.')
            ->setHelp(<<<EOF
<info>nensquefem:robots:run</info> Llança les aranyes, parseja i guarda les dades.

<info>php app/console nensquefem:robots:run --robot-id=0</info>

EOF
        )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $robotId = $input->getOption('robot-id');

        $robot = $this->getContainer()->get('jordi_llonch.webscrapper.extractor');

        $output->writeln('Iniciant robot...');

        $robot->run($robotId);

        $output->writeln('OK');
    }
}
