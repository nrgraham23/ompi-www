<?php
$topdir = "../../..";
$title = "MPI_Comm_accept(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_COMM_ACCEPT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_accept </b> - Establishes communication with a client.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_accept(const char *port_name, MPI_Info info, int root, MPI_Comm
comm, MPI_Comm *newcomm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_ACCEPT(PORT_NAME, INFO, ROOT, COMM, NEWCOMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;CHARACTER*(*)<tt> </tt>&nbsp;<tt> </tt>&nbsp;PORT_NAME
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;INFO, ROOT, COMM, NEWCOMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Intercomm MPI::Intracomm::Accept(const char* port_name,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Info&amp; info, int root) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>port_name </dt>
<dd>Port name (string, used only on <i>root</i>). </dd>

<dt>info </dt>
<dd>Options
given by root for the accept (handle, used only on root). No options currently
supported.  </dd>

<dt>root </dt>
<dd>Rank in <i>comm</i> of root node (integer). </dd>

<dt>comm </dt>
<dd>Intracommunicator
over which call is collective (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>newcomm </dt>
<dd>Intercommunicator
with client as remote group (handle) </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status
(integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Comm_accept establishes communication with a
client. It is collective over the calling communicator. It returns an intercommunicator
that allows communication with the client, after the client has connected
with the MPI_Comm_accept function using the <a href="../man3/MPI_Comm_connect.3.php">MPI_Comm_connect</a> function. <p>
The
<i>port_name</i> must have been established through a call to <a href="../man3/MPI_Open_port.3.php">MPI_Open_port</a> on
the root.
<p>
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
MPI_ERRORS_RETURN may be used to cause error values to be returned.   <p>
See
the MPI man page for a full list of MPI error codes.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<a href="../man3/MPI_Comm_connect.3.php">MPI_Comm_connect</a>
<a href="../man3/MPI_Open_port.3.php">MPI_Open_port</a> <br>

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
