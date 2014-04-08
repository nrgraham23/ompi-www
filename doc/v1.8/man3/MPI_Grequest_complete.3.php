<?php
$topdir = "../../..";
$title = "MPI_Grequest_complete(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_GREQUEST_COMPLETE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Grequest_complete </b> - Reports that a generalized request is complete.

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Grequest_complete(MPI_Request request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_GREQUEST_COMPLETE(REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Grequest::Complete()
</pre>
<h2><a name='sect5' href='#toc5'>Input/Output Parameter</a></h2>

<dl>

<dt>request </dt>
<dd>Generalized request (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Grequest_complete
informs MPI that the operations represented by the generalized request
<i>request</i> are complete. A call to <a href="../man3/MPI_Wait.3.php">MPI_Wait</a>(<i>request, status</i>) will return, and
a call to <a href="../man3/MPI_Test.3.php">MPI_Test</a>(<i>request, flag, status</i>) will return flag=true only after
a call to MPI_Grequest_complete has declared that these operations are
complete.  <p>
MPI imposes no restrictions on the code executed by the callback
functions. However, new nonblocking operations should be defined so that
the general semantic rules about MPI calls such as <a href="../man3/MPI_Test.3.php">MPI_Test</a>, <a href="../man3/MPI_Request_free.3.php">MPI_Request_free</a>,
or <a href="../man3/MPI_Cancel.3.php">MPI_Cancel</a> still hold. For example, all these calls are supposed to be
local and nonblocking. Therefore, the callback functions <i>query_fn</i>, <i>free_fn</i>,
or <i>cancel_fn</i> should invoke blocking MPI communication calls only if the
context is such that these calls are guaranteed to return in finite time.
Once <a href="../man3/MPI_Cancel.3.php">MPI_Cancel</a> has been invoked, the canceled operation should complete
in finite time, regardless of the state of other processes (the operation
has acquired "local" semantics). It should either succeed or fail without
side-effects. The user should guarantee these same properties for newly defined
operations.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI::Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input/Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
