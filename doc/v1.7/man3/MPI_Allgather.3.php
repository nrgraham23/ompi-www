<?php
$topdir = "../../..";
$title = "MPI_Allgather(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_ALLGATHER(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Allgather, <a href="../man3/MPI_Iallgather.3.php">MPI_Iallgather</a></b> - Gathers data from all processes

<p>and distributes it to all processes
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Allgather(const void *sendbuf, int  sendcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp; MPI_Datatype sendtype, void *recvbuf, int recvcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp; MPI_Datatype recvtype, MPI_Comm comm)
int <a href="../man3/MPI_Iallgather.3.php">MPI_Iallgather</a>(const void *sendbuf, int  sendcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp; MPI_Datatype sendtype, void *recvbuf, int recvcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp; MPI_Datatype recvtype, MPI_Comm comm, MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_ALLGATHER(SENDBUF, SENDCOUNT, SENDTYPE, RECVBUF, RECVCOUNT,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVTYPE, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF (*), RECVBUF (*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNT, SENDTYPE, RECVCOUNT, RECVTYPE, COMM,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;IERROR
<a href="../man3/MPI_Iallgather.3.php">MPI_IALLGATHER</a>(SENDBUF, SENDCOUNT, SENDTYPE, RECVBUF, RECVCOUNT,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVTYPE, COMM, REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF (*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNT, SENDTYPE, RECVCOUNT, RECVTYPE, COMM
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Allgather(const void* sendbuf, int sendcount, const
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Datatype&amp; sendtype, void* recvbuf, int recvcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; recvtype) const = 0
</pre>
<h2><a name='sect5' href='#toc5'>Java Syntax</a></h2>
<br>
<pre>import mpi.*;
void MPI.COMM_WORLD.Allgather(Object sendbuf, int sendoffset, int sendcount,
MPI.Datatype sendtype,
                              Object recvbuf, int recvoffset, int recvcount,
Datatype recvtype)
</pre>
<h2><a name='sect6' href='#toc6'>Input Parameters</a></h2>

<dl>

<dt>sendbuf     </dt>
<dd>Starting address of send buffer (choice). </dd>

<dt>sendoffset
    </dt>
<dd>Number of elements to skip at beginning of buffer (integer, Java-only).
</dd>

<dt>sendcount     </dt>
<dd>Number of elements in send buffer (integer). </dd>

<dt>sendtype
</dt>
<dd>Datatype of send buffer elements (handle). </dd>

<dt>recvbuf     </dt>
<dd>Starting address
of recv buffer (choice). </dd>

<dt>recvoffset     </dt>
<dd>Number of elements to skip at beginning
of buffer (integer, Java-only). </dd>

<dt>recvcount     </dt>
<dd>Number of elements received
from any process (integer). </dd>

<dt>recvtype     </dt>
<dd>Datatype of receive buffer elements
(handle). </dd>

<dt>comm     </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Output Parameters</a></h2>

<dl>

<dt>recvbuf </dt>
<dd>Address
of receive buffer (choice). </dd>

<dt>request </dt>
<dd>Request (handle, non-blocking only). </dd>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Description</a></h2>
MPI_Allgather is similar
to <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>, except that all processes receive the result, instead of
just the root. In other words, all processes contribute to the result, and
all processes receive the result.   <p>
The type signature associated with sendcount,
sendtype at a process must be equal to the type signature associated with
recvcount, recvtype at any other process. <p>
The outcome of a call to MPI_Allgather(...)
is as if all processes executed n calls to      <p>
<br>
<pre>  <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>(sendbuf,sendcount,sendtype,recvbuf,recvcount,
             recvtype,root,comm),
</pre><p>
</pre>for root = 0 , ..., n-1. The rules for correct usage of MPI_Allgather are easily
found from the corresponding rules for <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>. <p>
<b>Example:</b> The all-gather
version of Example 1 in <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>. Using  MPI_Allgather, we will gather
100 ints from every process in the group to every process. <p>
<br>
<pre>MPI_Comm comm;
    int gsize,sendarray[100];
    int *rbuf;
    ...
    <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>( comm, &amp;gsize);
    rbuf = (int *)malloc(gsize*100*sizeof(int));
    MPI_Allgather( sendarray, 100, MPI_INT, rbuf, 100, MPI_INT, comm);

</pre><p>
After the call, every process has the group-wide concatenation of the sets
of data.
<p>
<h2><a name='sect9' href='#toc9'>Use of In-place Option</a></h2>
When the communicator is an intracommunicator,
you can perform an all-gather operation in-place (the output buffer is used
as the input buffer).  Use the variable MPI_IN_PLACE as the value of <i>sendbuf</i>.
 In this case, <i>sendcount</i> and <i>sendtype</i> are ignored.  The input data of each
process is assumed to be in the area where that process would receive its
own contribution to the receive buffer.  Specifically, the outcome of a
call to MPI_Allgather that used the in-place option is identical to the
case in which all processes executed <i>n</i> calls to <p>
<br>
<pre>   <a href="../man3/MPI_Gather.3.php">MPI_GATHER</a> ( MPI_IN_PLACE, 0, MPI_DATATYPE_NULL, recvbuf,
   recvcount, recvtype, root, comm )
for root =0, ... , n-1.
</pre><p>
Note that MPI_IN_PLACE is a special kind of value; it has the same restrictions
on its use as MPI_BOTTOM. <p>
Because the in-place option converts the receive
buffer into a send-and-receive buffer, a Fortran binding that includes INTENT
must mark these as INOUT, not OUT.    <p>

<h2><a name='sect10' href='#toc10'>When Communicator is an Inter-communicator</a></h2>
<p>
When
the communicator is an inter-communicator, the gather operation occurs in
two phases.  The data is gathered from all the members of the first group
and received by all the members of the second group.  Then the data is gathered
from all the members of the second group and received by all the members
of the first.  The operation, however, need not be symmetric.  The number
of items sent by the processes in first group need not be equal to the
number of items sent by the the processes in the second group.  You can
move data in only one direction by giving <i>sendcount</i> a value of 0 for communication
in the reverse direction.   <p>
The first group defines the root process.  The
root process uses MPI_ROOT as the value of <i>root</i>.  All other processes in
the first group use MPI_PROC_NULL as the value of <i>root</i>.  All processes in
the second group use the rank of the root process in the first group as
the value of <i>root</i>. <p>
When the communicator is an intra-communicator, these
groups are the same, and the operation occurs in a single phase. <p>

<p>
<p>
<h2><a name='sect11' href='#toc11'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect12' href='#toc12'>See Also</a></h2>
<p>
<a href="../man3/MPI_Allgatherv.3.php">MPI_Allgatherv</a> <br>

<p><a href="../man3/MPI_Gather.3.php">MPI_Gather</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Java Syntax</a></li>
<li><a name='toc6' href='#sect6'>Input Parameters</a></li>
<li><a name='toc7' href='#sect7'>Output Parameters</a></li>
<li><a name='toc8' href='#sect8'>Description</a></li>
<li><a name='toc9' href='#sect9'>Use of In-place Option</a></li>
<li><a name='toc10' href='#sect10'>When Communicator is an Inter-communicator</a></li>
<li><a name='toc11' href='#sect11'>Errors</a></li>
<li><a name='toc12' href='#sect12'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
