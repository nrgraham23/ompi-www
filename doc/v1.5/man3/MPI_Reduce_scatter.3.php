<?php
$topdir = "../../..";
$title = "MPI_Reduce_scatter(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_REDUCE_SCATTER(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Reduce_scatter</b> - Combines values and scatters the results.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Reduce_scatter(void *sendbuf, void *recvbuf, int *recvcounts,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype datatype, MPI_Op op, MPI_Comm comm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_REDUCE_SCATTER(SENDBUF, RECVBUF, RECVCOUNTS, DATATYPE, OP,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVCOUNTS(*), DATATYPE, OP, COMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Reduce_scatter(const void* sendbuf, void* recvbuf,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int recvcounts[], const MPI::Datatype&amp; datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Op&amp; op) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>sendbuf </dt>
<dd>Starting address of send buffer (choice). </dd>

<dt>recvcounts
</dt>
<dd>Integer array specifying the number of elements in result distributed to
each process. Array must be identical on all calling processes. </dd>

<dt>datatype
</dt>
<dd>Datatype of elements of input buffer (handle). </dd>

<dt>op </dt>
<dd>Operation (handle). </dd>

<dt>comm
</dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>recvbuf </dt>
<dd>Starting address of receive
buffer (choice). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>

<p>
MPI_Reduce_scatter first does an element-wise reduction on vector of <i>count
=&nbsp;S(i)<i>revcounts</i>[i] elements in the send buffer defined by <i>sendbuf</i>, <i>count</i>,
and<br>
 <i>datatype</i>. Next, the resulting vector of results is split into n disjoint
segments, where n is the number of processes in the group. Segment i contains
<i>recvcounts</i>[i] elements. The ith segment is sent to process i and stored
in the receive buffer defined by <i>recvbuf</i>, <i>recvcounts</i>[i], and <i>datatype</i>.
<p>

<p>
<h2><a name='sect8' href='#toc8'>Use of In-place Option</a></h2>
When the communicator is an intracommunicator, you
can perform a reduce-scatter operation in-place (the output buffer is used
as the input buffer).  Use the variable MPI_IN_PLACE as the value of the
<i>sendbuf</i>.  In this case, the input data is taken from the top of the receive
buffer.  The area occupied by the input data may be either longer or shorter
than the data filled by the output data.  <p>

<h2><a name='sect9' href='#toc9'>When Communicator is an Inter-communicator</a></h2>
<p>
When
the communicator is an inter-communicator, the reduce-scatter operation occurs
in two phases.  First, the result of the reduction performed on the data
provided by the processes in the first group is scattered among the processes
in the second group.  Then the reverse occurs: the reduction performed on
the data provided by the processes in the second group is scattered among
the processes in the first group.  For each group, all processes provide
the same <i>recvcounts</i> argument, and the sum of the <i>recvcounts</i> values should
be the same for both groups.   <p>

<h2><a name='sect10' href='#toc10'>Notes on Collective Operations</a></h2>

<p> The reduction
functions ( <i>MPI_Op</i> ) do not return an error value.  As a result, if the
functions detect an error, all they can do is either call  <i><a href="../man3/MPI_Abort.3.php">MPI_Abort</a></i> or
silently skip the problem.  Thus, if you change the error handler from <i>MPI_ERRORS_ARE_FATAL</i>
to something else, for example,  <i>MPI_ERRORS_RETURN</i> , then no error may
be indicated.
<p> The reason for this is the performance problems in ensuring
that all collective routines return the same error value.
<p>
<h2><a name='sect11' href='#toc11'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
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
<li><a name='toc8' href='#sect8'>Use of In-place Option</a></li>
<li><a name='toc9' href='#sect9'>When Communicator is an Inter-communicator</a></li>
<li><a name='toc10' href='#sect10'>Notes on Collective Operations</a></li>
<li><a name='toc11' href='#sect11'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
