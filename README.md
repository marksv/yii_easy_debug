[![MarkSV](http://marksv.com/wp-content/themes/twentyfifteen/images/logo.png)](http://marksv.com/)

# Yii easy debug class

This is a simple class that will help any developer to debug programs written on the Yii

How it work
-----------

To view the value of a variable on-screen debugging, you need to write code:

	Debug::add($var);

To make the display on the screen, you need to write code:

	Debug::out($local = true);


Intallation in Yii
------------

This class we will establish the framework Yii, but it can be used anywhere. To do this, copy the file `Debug.php` to the folder `components` and verify configuration Yii, the class is automatically connected:

	'import'=>array(
		'application.components.*'
	),

Next, you need to make a call to debug output.
This can be implemented such in your controller, overriding the render method:

	public function render($view, $data=NULL, $return=false)
	{
		global $local;
		Debug::out($local);
		parent::render($view, $data, $return);
	}

What's the variable $local?
If you are running two versions of the program, development and production environment, then in the config of the developepment environment $local variable must be equal to true.

Another exemplary embodiment without variable $local and output in footer:

	public function render($view, $data=NULL, $return=false)
	{
		parent::render($view, $data, $return);
		Debug::out(true);
	}
