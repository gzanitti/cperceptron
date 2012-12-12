cPerceptron
===========

A neural network (Simple Perceptron) implemented in PHP.

Usage
===========
You need to create a training set of input and output values to train the network, like these:
<pre><code>$trainIn = array(
	array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	array(1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1),
	array(-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1,1,-1),
	array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1));

$trainOut = array(
	array(1,1,1),
	array(1,-1,1),
	array(-1,1,-1),
	array(-1,-1,-1));
</code></pre>
After this, you can call the function trainPS with the following parameters:
<pre><code>$cp = new cperceptron();
$w = $cp->trainPS($trainIn, $trainOut, $error, $iter, $vel);
</code></pre>
- $trainIn: Training set, input values.
- $trainOut: Training set, output values.
- $error: Maximum level of error.
- $iter: Maximum number of iterations.
- $vel: Learning speed.

The result of this call is a weight matrix corresponding to the neural network trained with the training set introduced.

Now, everything is ready to test the network. You just have to make the following function call:
<pre><code>$test = $pc->matrix2Vector($trainIn, 1);
$res = $pc->prodMatrix($test, $w);
$pc->signMatrix($res);
</code></pre>
Where 1 represents the input value you want to test.
The result should be the value assigned in the Training Set (output value).

You can also test the network with altered values ​​and let this approximates the results.
For examplen, with this input value:
<pre><code>array(1,1,1,-1,1,1,1,1,1,1,1,1,-1,1,1,1,1,1,1,1,1,-1,1,1,1)</code></pre>
