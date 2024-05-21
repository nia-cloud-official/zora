
function renderLibraries() {
  let handler = Deno.dlopen("./../database/database.dll", Symbol.arguments);
  return handler;
}

renderLibraries();

export function runDatabaseCommands(_command: string) {
  return _commandResult;
}


Tac10 @0997