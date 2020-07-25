<?php

namespace Vt100;

class Vt100
{	private static $COLORS = ["black", "red", "green", "yellow", "blue", "magenta", "cyan", "white"];

	private static $ALL_COLORS =
	[	'aliceblue' => 15792383,
		'antiquewhite' => 16444375,
		'aqua' => 65535,
		'aquamarine' => 8388564,
		'azure' => 15794175,
		'beige' => 16119260,
		'bisque' => 16770244,
		'black' => 0,
		'blanchedalmond' => 16772045,
		'blue' => 255,
		'blueviolet' => 9055202,
		'brown' => 10824234,
		'burlywood' => 14596231,
		'cadetblue' => 6266528,
		'chartreuse' => 8388352,
		'chocolate' => 13789470,
		'coral' => 16744272,
		'cornflowerblue' => 6591981,
		'cornsilk' => 16775388,
		'crimson' => 14423100,
		'cyan' => 65535,
		'darkblue' => 139,
		'darkcyan' => 35723,
		'darkgoldenrod' => 12092939,
		'darkgray' => 11119017,
		'darkgrey' => 11119017,
		'darkgreen' => 25600,
		'darkkhaki' => 12433259,
		'darkmagenta' => 9109643,
		'darkolivegreen' => 5597999,
		'darkorange' => 16747520,
		'darkorchid' => 10040012,
		'darkred' => 9109504,
		'darksalmon' => 15308410,
		'darkseagreen' => 9419919,
		'darkslateblue' => 4734347,
		'darkslategray' => 3100495,
		'darkslategrey' => 3100495,
		'darkturquoise' => 52945,
		'darkviolet' => 9699539,
		'deeppink' => 16716947,
		'deepskyblue' => 49151,
		'dimgray' => 6908265,
		'dimgrey' => 6908265,
		'dodgerblue' => 2003199,
		'firebrick' => 11674146,
		'floralwhite' => 16775920,
		'forestgreen' => 2263842,
		'fuchsia' => 16711935,
		'gainsboro' => 14474460,
		'ghostwhite' => 16316671,
		'gold' => 16766720,
		'goldenrod' => 14329120,
		'gray' => 8421504,
		'grey' => 8421504,
		'green' => 32768,
		'greenyellow' => 11403055,
		'honeydew' => 15794160,
		'hotpink' => 16738740,
		'indianred' => 13458524,
		'indigo' => 4915330,
		'ivory' => 16777200,
		'khaki' => 15787660,
		'lavender' => 15132410,
		'lavenderblush' => 16773365,
		'lawngreen' => 8190976,
		'lemonchiffon' => 16775885,
		'lightblue' => 11393254,
		'lightcoral' => 15761536,
		'lightcyan' => 14745599,
		'lightgoldenrodyellow' => 16448210,
		'lightgray' => 13882323,
		'lightgrey' => 13882323,
		'lightgreen' => 9498256,
		'lightpink' => 16758465,
		'lightsalmon' => 16752762,
		'lightseagreen' => 2142890,
		'lightskyblue' => 8900346,
		'lightslategray' => 7833753,
		'lightslategrey' => 7833753,
		'lightsteelblue' => 11584734,
		'lightyellow' => 16777184,
		'lime' => 65280,
		'limegreen' => 3329330,
		'linen' => 16445670,
		'magenta' => 16711935,
		'maroon' => 8388608,
		'mediumaquamarine' => 6737322,
		'mediumblue' => 205,
		'mediumorchid' => 12211667,
		'mediumpurple' => 9662683,
		'mediumseagreen' => 3978097,
		'mediumslateblue' => 8087790,
		'mediumspringgreen' => 64154,
		'mediumturquoise' => 4772300,
		'mediumvioletred' => 13047173,
		'midnightblue' => 1644912,
		'mintcream' => 16121850,
		'mistyrose' => 16770273,
		'moccasin' => 16770229,
		'navajowhite' => 16768685,
		'navy' => 128,
		'oldlace' => 16643558,
		'olive' => 8421376,
		'olivedrab' => 7048739,
		'orange' => 16753920,
		'orangered' => 16729344,
		'orchid' => 14315734,
		'palegoldenrod' => 15657130,
		'palegreen' => 10025880,
		'paleturquoise' => 11529966,
		'palevioletred' => 14381203,
		'papayawhip' => 16773077,
		'peachpuff' => 16767673,
		'peru' => 13468991,
		'pink' => 16761035,
		'plum' => 14524637,
		'powderblue' => 11591910,
		'purple' => 8388736,
		'rebeccapurple' => 6697881,
		'red' => 16711680,
		'rosybrown' => 12357519,
		'royalblue' => 4286945,
		'saddlebrown' => 9127187,
		'salmon' => 16416882,
		'sandybrown' => 16032864,
		'seagreen' => 3050327,
		'seashell' => 16774638,
		'sienna' => 10506797,
		'silver' => 12632256,
		'skyblue' => 8900331,
		'slateblue' => 6970061,
		'slategray' => 7372944,
		'slategrey' => 7372944,
		'snow' => 16775930,
		'springgreen' => 65407,
		'steelblue' => 4620980,
		'tan' => 13808780,
		'teal' => 32896,
		'thistle' => 14204888,
		'tomato' => 16737095,
		'turquoise' => 4251856,
		'violet' => 15631086,
		'wheat' => 16113331,
		'white' => 16777215,
		'whitesmoke' => 16119285,
		'yellow' => 16776960,
		'yellowgreen' => 10145074,
	];

	/**	Convert html tags to VT100 terminal codes.

		Examples:

		<b>bold</b>
		<i>italic</i>
		<u>underlined</u>
		<blink>blink</blink>
		<em>inverse fg/bg</em>

		style="color: black" (produces classic escape codes for: black, red, green, yellow, blue, magenta, cyan, white)
		style="color: orange" (produces nonclassic escape codes)
		style="color: #AABBCC" (produces nonclassic escape codes)

		style="background-color: black" (produces classic escape codes for: black, red, green, yellow, blue, magenta, cyan, white)
		style="background-color: orange" (produces nonclassic escape codes)
		style="background-color: #AABBCC" (produces nonclassic escape codes)

		<b>bold <span style="font-weight: normal">normal</span></b>
		<i>italic <span style="font-style: normal">normal</span></i>
		<u>underlined <span style="text-decoration: none">normal</span></u>

		<font color=blue>blue</font>
	 **/
	public static function from_html($str)
	{	$stack = [];
		$stack_len = 0;
		$mode_stack = [];
		$cur_mode = null;
		$str = preg_replace_callback
		(	'~<(/?)([a-z_\-:]+)((?:[^>/"\']+|"[^"]*"|\'[^\']*\')*)>~i',
			function($m) use(&$stack, &$stack_len, &$mode_stack, &$cur_mode)
			{	$is_close_tag = $m[1];
				$tag_name = strtolower($m[2]);
				$attrs = $m[3];
				if ($is_close_tag)
				{	$old_stack_len = $stack_len;
					for ($i=0; $stack_len>0 && $stack[--$stack_len]!=$tag_name; $i++);
					if ($i>1 and ($stack_len==0 || $i>2))
					{	$stack_len = $old_stack_len; // assume: misplaced closing tag
						return $m[0];
					}
				}
				$mode = $stack_len==0 ? [] : $mode_stack[$stack_len-1];
				if (!$is_close_tag)
				{	if ($tag_name=='b' or $tag_name=='strong')
					{	$mode[1] = true; // bold
					}
					else if ($tag_name == 'i')
					{	$mode[3] = true; // italic
					}
					else if ($tag_name == 'u')
					{	$mode[4] = true; // underline
					}
					else if ($tag_name == 'blink')
					{	$mode[5] = true; // blink
					}
					else if ($tag_name == 'em')
					{	$mode[7] = true; // inverse
					}
					$attrs = preg_replace_callback
					(	'~\s+(?:([a-z]+)\s*=\s*)?([^\s"\']+|"[^"]*"|\'[^\']*\')+~i',
						function($m) use(&$mode)
						{	$attr_name = strtolower($m[1]);
							$attr_value = str_replace("'", '', str_replace('"', '', strtolower($m[2])));
							if ($attr_name == 'color')
							{	$color = self::get_color($attr_value, 30);
								if ($color)
								{	$mode[$color] = true;
								}
							}
							else if ($attr_name == 'style')
							{	foreach (preg_split('~\s*;\s*~', $attr_value) as $rule)
								{	$kv = preg_split('~\s*:\s*~', trim($rule));
									if (count($kv) == 2)
									{	list($key, $value) = $kv;
										if ($key == 'color')
										{	$color = self::get_color($value, 30);
											if ($color)
											{	$mode[$color] = true;
											}
										}
										else if ($key == 'background-color')
										{	$color = self::get_color($value, 40);
											if ($color)
											{	$mode[$color] = true;
											}
										}
										else if ($key == 'font-weight')
										{	if ($value=='bold' or $value=='bolder' or $value>400)
											{	$mode[1] = true; // bold
											}
											else
											{	unset($mode[1]);
											}
										}
										else if ($key == 'font-style')
										{	if ($value=='italic' or $value=='oblique')
											{	$mode[3] = true; // bold
											}
											else
											{	unset($mode[3]);
											}
										}
										else if ($key == 'text-decoration')
										{	if (strpos($value, 'underline') !== false)
											{	$mode[4] = true; // bold
											}
											else
											{	unset($mode[4]);
											}
										}
									}
								}
							}
						},
						$attrs
					);
					$stack[$stack_len] = $tag_name;
					$mode_stack[$stack_len] = $mode;
					$stack_len++;
				}
				$attrs = "";
				foreach ($mode as $code => $true)
				{	unset($cur_mode[$code]);
					$attrs .= "\033[{$code}m";
				}
				if ($cur_mode)
				{	$attrs = "\033[0m$attrs"; // reset all attributes
				}
				$cur_mode = $mode;
				return $attrs;
			},
			$str
		);
		if ($cur_mode)
		{	$str .= "\033[0m";
		}
		return html_entity_decode($str, ENT_HTML5|ENT_QUOTES);
	}

	/**	Convert VT100 terminal codes generated by from_html() back to html.
	 **/
	public static function to_html($str)
	{	$close_tags = '';
		$str = preg_replace_callback
		(	'~<|&|>|\033\[(\d+)(?:;2;(\d+);(\d+);(\d+))?m~',
			function($m) use(&$close_tags)
			{	switch ($m[0])
				{	case '<': return '&lt;';
					case '&': return '&amp;';
					case '>': return '&gt;';
				}
				$code = $m[1];
				switch ($code)
				{	case 0: $c = $close_tags; $close_tags = ''; return $c;
					case 1: $close_tags = "</b>$close_tags"; return "<b>";
					case 3: $close_tags = "</i>$close_tags"; return "<i>";
					case 4: $close_tags = "</u>$close_tags"; return "<u>";
					case 5: $close_tags = "</blink>$close_tags"; return "<blink>";
					case 7: $close_tags = "</em>$close_tags"; return "<em>";
					case 30:
					case 31:
					case 32:
					case 33:
					case 34:
					case 35:
					case 36:
					case 37: $close_tags = "</span>$close_tags"; return '<span style="color:'.self::$COLORS[$code-30].'">';
					case 40:
					case 41:
					case 42:
					case 43:
					case 44:
					case 45:
					case 46:
					case 47: $close_tags = "</span>$close_tags"; return '<span style="background-color:'.self::$COLORS[$code-40].'">';
					case 38: $close_tags = "</span>$close_tags"; return sprintf('<span style="color:#%02X%02X%02X">', $m[2], $m[3], $m[4]);
					case 48: $close_tags = "</span>$close_tags"; return sprintf('<span style="background-color:#%02X%02X%02X">', $m[2], $m[3], $m[4]);
				}
				return $m[0];
			},
			$str
		);
		return "$str$close_tags";
	}

	private static function get_color($spec, $fg_30_bg_40)
	{	// Try basic color name
		$n_color = array_search($spec, self::$COLORS);
		if ($n_color !== false)
		{	return $fg_30_bg_40 + $n_color; // 30..37: colored foreground, 40..47: colored background
		}

		// Try extended color name and color code
		$color = null;
		if (isset(self::$ALL_COLORS[$spec]))
		{	// extended color name
			$color = self::$ALL_COLORS[$spec];
		}
		else if ($spec and $spec[0]=='#')
		{	// color code
			if (strlen($spec) == 4)
			{	$spec = "#".$spec[1].$spec[1].$spec[2].$spec[2].$spec[3].$spec[3];
			}
			if (strlen($spec) == 7)
			{	$color = hexdec(substr($spec, 1));
			}
		}
		if ($color !== null)
		{	return ($fg_30_bg_40+8).';2;'.(($color>>16) & 0xFF).';'.(($color>>8) & 0xFF).';'.($color&0xFF);
		}
	}
}
