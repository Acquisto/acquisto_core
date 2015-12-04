<?php

namespace Acquisto\Drivers;
use Acquisto\Models\ShopProducttypesModel as ProductTypeModel;

class DC_Product extends \DC_Table
{
	public function getPalette()
	{
		$palette = 'default';
#		$strPalette = $GLOBALS['TL_DCA'][$this->strTable]['palettes'][$palette];

		// Check whether there are selector fields
		if (!empty($GLOBALS['TL_DCA'][$this->strTable]['palettes']['__selector__']))
		{
			$sValues = array();
			$subpalettes = array();

			$objFields = $this->Database->prepare("SELECT * FROM " . $this->strTable . " WHERE id=?")
										->limit(1)
										->execute($this->intId);

			// Get selector values from DB
			if ($objFields->numRows > 0)
			{
				foreach ($GLOBALS['TL_DCA'][$this->strTable]['palettes']['__selector__'] as $name)
				{
					$trigger = $objFields->$name;

					// Overwrite the trigger
					if (\Input::post('FORM_SUBMIT') == $this->strTable)
					{
						$key = (\Input::get('act') == 'editAll') ? $name.'_'.$this->intId : $name;

						if (isset($_POST[$key]))
						{
							$trigger = \Input::post($key);
						}
					}

					if ($trigger != '')
					{
						if ($GLOBALS['TL_DCA'][$this->strTable]['fields'][$name]['inputType'] == 'checkbox' && !$GLOBALS['TL_DCA'][$this->strTable]['fields'][$name]['eval']['multiple'])
						{
							$sValues[] = $name;

							// Look for a subpalette
							if (strlen($GLOBALS['TL_DCA'][$this->strTable]['subpalettes'][$name]))
							{
								$subpalettes[$name] = $GLOBALS['TL_DCA'][$this->strTable]['subpalettes'][$name];
							}
						}
						else
						{
							$sValues[] = $trigger;
							$key = $name .'_'. $trigger;

							// Look for a subpalette
							if (strlen($GLOBALS['TL_DCA'][$this->strTable]['subpalettes'][$key]))
							{
								$subpalettes[$name] = $GLOBALS['TL_DCA'][$this->strTable]['subpalettes'][$key];
							}
						}
					}
				}
			}

			// Build possible palette names from the selector values
			if (!count($sValues))
			{
				$names = array('default');
			}
			elseif (count($sValues) > 1)
			{
				foreach ($sValues as $k=>$v)
				{
					// Unset selectors that just trigger subpalettes (see #3738)
					if (isset($GLOBALS['TL_DCA'][$this->strTable]['subpalettes'][$v]))
					{
						unset($sValues[$k]);
					}
				}

				$names = $this->combiner($sValues);
			}
			else
			{
				$names = array($sValues[0]);
			}


			foreach($GLOBALS['TL_DCA'][$this->strTable]['palettes']['default'] as $k=>$v) 
			{
				if(is_array($v))
				{
					foreach($v as $name)
					{
						$legendArray[$k][] = $name;
					}
				}
			}

			// Get an existing palette
			foreach ($names as $paletteName)
			{
				$fields = unserialize(ProductTypeModel::findById($paletteName)->fields);
				foreach($fields as $name) 
				{
					$legendName = $GLOBALS['TL_DCA'][$this->strTable]['fields'][$name]['eval']['be_acqLegend'];
					if(!$legendName) 
					{
						$legendName = 'undefiend';
					}

					$legendArray[$legendName][] = $name;
				}


#				if (strlen($GLOBALS['TL_DCA'][$this->strTable]['palettes'][$paletteName]))
#				{
#					$strPalette = $GLOBALS['TL_DCA'][$this->strTable]['palettes'][$paletteName];
#					break;
#				}
			}

			foreach($legendArray as $k=>$v)
			{
			    $strPalette .= "{" . $k . "_legend}," . implode(",", $v) . ";";
			}

			// Include subpalettes
			foreach ($subpalettes as $k=>$v)
			{
				$strPalette = preg_replace('/\b'. preg_quote($k, '/').'\b/i', $k.',['.$k.'],'.$v.',[EOF]', $strPalette);
			}
		}

		return $strPalette;
	}
}
