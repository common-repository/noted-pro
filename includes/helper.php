<?php
/* HELPER FUNCTIONS */

function notepad_get_serdata($data,$keynote){
	if(!empty($data)){
		foreach ($data as $key) {
			if($key->name == $keynote){
				return $key->value;
			}
		}
	}
}
