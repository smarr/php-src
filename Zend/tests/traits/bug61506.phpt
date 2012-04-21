--TEST--
Bug #61506 (insteadof causes memory leak for unbound classes)
--FILE--
<?php
if (false) {
	/** class is never bound */
	class A {
		use b2, b33 {
			b2::b444 insteadof b33;
			b2::b444 as b5555;
		}
	}
}

echo 'DONE';
--EXPECT--
DONE