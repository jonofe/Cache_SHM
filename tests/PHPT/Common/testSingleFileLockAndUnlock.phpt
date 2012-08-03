--TEST--
Tests locking and unlocking within a single file
--FILE--
<?php
namespace PEAR2\Cache\SHM\Adapter;
require_once '_runner.inc';

$adapterName = __NAMESPACE__ . '\\' . $adapter;
$object = new $adapterName('TEST');

\assertSame(true, $object->lock('key'), __FILE__);
\assertSame(false, $object->lock('key'), __FILE__);
\assertSame(true, $object->unlock('key'), __FILE__);
\assertSame(false, $object->unlock('key'), __FILE__);

\assertSame(true, $object->lock('key'), __FILE__);
\assertSame(false, $object->lock('key'), __FILE__);
\assertSame(true, $object->unlock('key'), __FILE__);
\assertSame(false, $object->unlock('key'), __FILE__);
?>
--EXPECT--