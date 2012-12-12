cPerceptron
===========

A neural network (Simple Perceptron) implemented in PHP.

Usage
===========
You need to create a training set of input and output values ​​to train the network, like these:
<code>
$trainIn = array(
		array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
		array(1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1),
		array(-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1),
		array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1));
$trainOut = array(
		array(1,1,1),
		array(1,-1,1),
		array(-1,1,-1),
		array(-1,-1,-1));
<\code>

After this, you can call the function trainPS with the following parameters:
<code>
$cp = new cperceptron();
$w = $cp->trainPS($trainIn, $trainOut, $error, $iter, $vel);
</code>

- $trainIn: Training set, input values.
- $trainOut: Training set, output values.
- $error: Maximum level of error.
- $iter: Maximum number of iterations.
- $vel: Learning speed.


