<?php
class cmatrix
{	
	private function rdmFloat ($min,$max)
	{
		return ($min+lcg_value()*(abs($max-$min)));
	}
	
	public function weightMatrix ($column,$row)
	{
		$weight = array();	
		srand(0.89);
		
		for ($i=0; $i < $column; $i++)
		{
			$weight[$i] = array();
			
			for ($j=0; $j < $row; $j++)
			{
				$weight[$i][$j] = $this->rdmFloat(0,1);
			}
		}		
		return $weight;
	}

	public function prodMatrix ($matrix1, $matrix2)
	{
		$prod = array();
		for($row=0; $row < sizeof($matrix1); $row++)
		{		
			for($i=0; $i < sizeof($matrix2[0]); $i++)
			{
				$res = $this->prodRowMatrix($matrix1[$row], $this->iRow($matrix2,$i));
				$prod[$row][$i] = $res;
			}
		}
		return $prod;
	}
	
	private function prodRowMatrix($matrix1, $matrix2)
	{
		$res = 0;
		for($i=0; $i < sizeof($matrix1); $i++)
		{
			$prod = $matrix1[$i] * $matrix2[$i];
			$res = $res + $prod;
		}
		return $res;
	}
	
	public function prodVector($matrix1, $matrix2)
	{
		$res = array();
		for($i=0; $i < sizeof($matrix1); $i++)
		{
			$prod = $matrix1[$i] * $matrix2[$i];
			$res[0][$i] = $prod;
		}
		return $res;
	}
	
	private function iRow($matrix, $i)
	{
		$res = array();
		for($j=0; $j < sizeof($matrix); $j++)
		{
			$res[$j] = $matrix[$j][$i]; 
		}
		
		return $res;
	}
	
	public function transMatrix ($matrix)
	{
		
		for ($i=0; $i < sizeof($matrix); $i++)
		{
			for ($j=0; $j < sizeof($matrix[$i]); $j++)
			{
				$trans[$j][$i] = $matrix[$i][$j];
			}
		}
		return $trans;
	}
	
	public function minusMatrix ($matrix1, $matrix2)
	{
		for ($i=0; $i < sizeof($matrix1); $i++)
		{
			for ($j=0; $j < sizeof($matrix1[$i]); $j++)
			{
				$res[$i][$j] = $matrix1[$i][$j] - $matrix2[$i][$j];
			}
		}
		return $res;
	}
	
	public function plusMatrix ($matrix1, $matrix2)
	{
		for ($i=0; $i < sizeof($matrix1); $i++)
		{
			for ($j=0; $j < sizeof($matrix1[$i]); $j++)
			{
				@$res[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
			}
		}
		return $res;
	}
	
	public function minusConsMatrix ($cons, $matrix)
	{
		$res = array();
		for ($i=0; $i < sizeof($matrix); $i++)
		{
			for ($j=0; $j < sizeof($matrix[$i]); $j++)
			{
				$res[$i][$j] = $cons - $matrix[$i][$j];
			}
		}
		return $res;
	}
	
	public function tanhMatrix ($matrix)
	{
		for ($i=0; $i < sizeof($matrix); $i++)
			{
			for ($j=0; $j < sizeof($matrix[$i]); $j++)
			{
				$matrix[$i][$j] = tanh($matrix[$i][$j]);
			}
		}
		return $matrix;
	}
	
	public function norm2Matrix ($matrix)
	{
		for($i=0; $i < sizeof($matrix); $i++)
		{
			$norm = 0;
			
			for($j=0; $j < sizeof($matrix[$i]); $j++)
			{
				$norm += $matrix[$i][$j] * $matrix[$i][$j];
			}
			
			$res[] = $norm;
		}
		return $res;
	}
	
	public function sumMatrix ($matrix)
	{
		for($i=0; $i < sizeof($matrix); $i++)
		{
			$sum = 0;
			
			for($j=0; $j < sizeof($matrix[$i]); $j++)
			{
				$sum += $matrix[$i][$j];
			}
		}
		return $sum;
	}
	
	public function signMatrix($matrix)
	{
		$res = array();
		for($i=0; $i < sizeof($matrix); $i++)
		{
			for ($j=0; $j < sizeof($matrix[$i]); $j++)
			{
				if ($matrix[$i][$j] < 0)
				{
					$sign = -1;
				}
				else 
				{
					$sign = 1;
				}
				$res[$i][$j] = $sign;  
			}
		}
		return $res;
	}
	
	public function matrix2Vector($matrix, $i)
	{
		$res = array();
		$res[0] = $matrix[$i];
		
		return $res;
	}
	
	public function prodConsMatrix($cons, $matrix)
	{
		$res = array();
		for ($i=0; $i < sizeof($matrix); $i++)
		{
			for ($j=0; $j < sizeof($matrix[$i]); $j++)
			{
				$res[$i][$j] = $cons * $matrix[$i][$j];
			}
		}
		return $res;
	}
}

?>