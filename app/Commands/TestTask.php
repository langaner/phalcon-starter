<?php

use Danzabar\CLI\Tasks\Task;

class TestTask extends Task
{

	/**
	 * The name of the task
	 *
	 * @var string
	 */
	protected $name = 'test';

	/**
	 * The description of the task
	 *
	 * @var string
	 */
	protected $description = 'description';

	/**
	 * The main action
	 *
	 * @Action
	 * @return void
	 * @author Dan Cox
	 */
	public function main()
	{
		$this->output->writeln('This is phalcon!');
	}

}
