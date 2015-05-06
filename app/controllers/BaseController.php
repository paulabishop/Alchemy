<?php

/*Author: Laravel (install)
Revision date: 2/25/15
File name: BaseController.php
Description: Defines Controller Object overall which is then extended to create other controllers for specific purposes. While not an abstract class itself (though perhaps Controller is), it is rarely instantiated directly.*/

class BaseController extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
